package main

import (
	"fmt"
	"main/lib"
	"net"
	"os"
	"strconv"

	_ "github.com/joho/godotenv/autoload"
)

var (
	node0Port = os.Getenv("node0_port")
	node1Port = os.Getenv("node1_port")
	node2Port = os.Getenv("node2_port")

	incomingSocket *net.UDPConn
	outgoingSocket *net.UDPConn
)

func getNodePort(nodeId int) string {
	switch nodeId {
	case 0:
		return node0Port
	case 1:
		return node1Port
	case 2:
		return node2Port
	}
	panic("Invalid value")
}

func makeConnection(nodeInt int) lib.Node {
	outgoingSocket = lib.CreateConnection(getNodePort(nodeInt))
	node := lib.Node{Id: nodeInt, Socket: outgoingSocket}
	return node
}

type OperationType int

const (
	LocalOperation OperationType = iota
	SendOperation
	ReceiveOperation
)

type Operation struct {
	Type         OperationType
	SourceNodeId int
	TargetNodeId int
}

func (op OperationType) String() string {
	switch op {
	case LocalOperation:
		return "LocalOperation"
	case SendOperation:
		return "SendOperation"
	case ReceiveOperation:
		return "ReceiveOperation"
	}
	panic("Invalid")
}

// ID dos nodos de exemplo
const (
	A = 0
	B = 1
	C = 2
)

func main() {
	totalProcesses := os.Getenv("processes")
	nodeId, _ := strconv.Atoi(os.Args[1])

	fmt.Printf("Started node with id: %d, total processes: %s\n", nodeId, totalProcesses)
	fmt.Println("Ready to start connections with other nodes")

	incomingSocket = lib.ReceiveConnection(getNodePort(nodeId))

	// Replicando o exemplo do slide 23:
	// https://moodle.ufsc.br/pluginfile.php/5355019/mod_resource/content/2/INE5418_aula18_relogios_logicos.pdf
	// Id dos nodos: P1 = 0, P2 = 1, P3 = 2

	operations := []Operation{
		{Type: LocalOperation, SourceNodeId: A, TargetNodeId: A},   // A
		{Type: SendOperation, SourceNodeId: C, TargetNodeId: B},    // E
		{Type: ReceiveOperation, SourceNodeId: C, TargetNodeId: B}, // F
		{Type: SendOperation, SourceNodeId: A, TargetNodeId: B},    // B
		{Type: ReceiveOperation, SourceNodeId: A, TargetNodeId: B}, // C
		{Type: LocalOperation, SourceNodeId: C, TargetNodeId: C},   // G
		{Type: LocalOperation, SourceNodeId: A, TargetNodeId: A},   // D
		{Type: SendOperation, SourceNodeId: B, TargetNodeId: A},    // H
		{Type: ReceiveOperation, SourceNodeId: B, TargetNodeId: A}, // I
		{Type: SendOperation, SourceNodeId: A, TargetNodeId: B},    // J
		{Type: ReceiveOperation, SourceNodeId: A, TargetNodeId: B}, // K
	}

	for i, op := range operations {
		fmt.Printf("Current operation: %d (%+v)\n", i, op)
		fmt.Println("Type enter to execute")

		var newline string
		fmt.Scanln(&newline)

		switch op.Type {
		case LocalOperation:
			if op.TargetNodeId == nodeId {
				lib.LocalInstruction(op.TargetNodeId)
			}

		case SendOperation:
			if op.SourceNodeId == nodeId {
				targetNode := makeConnection(op.TargetNodeId)
				lib.Send(targetNode, op.SourceNodeId, "dummy message")
			}

		case ReceiveOperation:
			if op.TargetNodeId == nodeId {
				targetNode := lib.Node{Id: nodeId, Socket: incomingSocket}
				message := lib.Receive(targetNode, op.TargetNodeId)
				fmt.Println("Received message:", message, "from node:", op.SourceNodeId)
			}
		}
	}
}
