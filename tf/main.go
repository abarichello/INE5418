package main

import (
	"fmt"
	"main/lib"
	"os"
	"strconv"
	"time"

	_ "github.com/joho/godotenv/autoload"
)

var (
	node0Port = os.Getenv("node0_port")
	node1Port = os.Getenv("node1_port")
	node2Port = os.Getenv("node2_port")

	nodeConnectionA lib.Node
	nodeConnetionB  lib.Node
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

func getOtherNodeIds(nodeId int) []int {
	switch nodeId {
	case 0:
		return []int{1, 2}
	case 1:
		return []int{0, 2}
	case 2:
		return []int{0, 1}
	}
	panic("Error getothernodeids")
}

func getConnection(nodeInt int) lib.Node {
	if nodeConnectionA.Id == nodeInt {
		return nodeConnectionA
	} else if nodeConnetionB.Id == nodeInt {
		return nodeConnetionB
	}
	panic("Error getconnection")
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

	otherNodes := getOtherNodeIds(nodeId)

	nodeConnectionA = lib.Node{Id: otherNodes[0], Socket: lib.ReceiveConnection(getNodePort(nodeId))}
	time.Sleep(2 * time.Second)
	nodeConnetionB = lib.Node{Id: otherNodes[1], Socket: lib.CreateConnection(getNodePort(otherNodes[1]))}

	// Replicando o exemplo do slide 23:
	// https://moodle.ufsc.br/pluginfile.php/5355019/mod_resource/content/2/INE5418_aula18_relogios_logicos.pdf
	// Id dos nodos: P1 = 0, P2 = 1, P3 = 2

	operations := []Operation{
		{Type: LocalOperation, SourceNodeId: A, TargetNodeId: A},   // A
		{Type: SendOperation, SourceNodeId: A, TargetNodeId: B},    // B
		{Type: ReceiveOperation, SourceNodeId: A, TargetNodeId: B}, // C
		{Type: LocalOperation, SourceNodeId: A, TargetNodeId: A},   // D
		{Type: SendOperation, SourceNodeId: C, TargetNodeId: B},    // E
		{Type: ReceiveOperation, SourceNodeId: C, TargetNodeId: B}, // F
		{Type: LocalOperation, SourceNodeId: C, TargetNodeId: C},   // G
		{Type: SendOperation, SourceNodeId: B, TargetNodeId: A},    // H
		{Type: ReceiveOperation, SourceNodeId: B, TargetNodeId: A}, // I
		{Type: SendOperation, SourceNodeId: A, TargetNodeId: B},    // J
		{Type: ReceiveOperation, SourceNodeId: A, TargetNodeId: B}, // K
	}

	for i, op := range operations {
		fmt.Printf("Executing operation %d (%+v)\n", i, op)

		switch op.Type {
		case LocalOperation:
			lib.LocalInstruction(op.TargetNodeId)

		case SendOperation:
			targetNode := getConnection(op.TargetNodeId)
			lib.Send(targetNode, op.SourceNodeId, "dummy message")

		case ReceiveOperation:
			targetNode := getConnection(op.SourceNodeId)
			message := lib.Receive(targetNode, op.TargetNodeId)
			fmt.Println("Received message:", message, "from node:", op.SourceNodeId)
		}

		time.Sleep(2 * time.Second)
	}

	// if nodeId == 0 {
	// 	node0 := lib.Node{Id: 0, Socket: lib.ReceiveConnection(node0Port)}
	// 	msg := lib.Receive(node0, nodeId)
	// 	fmt.Println("Received message:", msg)
	// } else if nodeId == 1 {
	// 	node1 := lib.Node{Id: 1, Socket: lib.CreateConnection(node0Port)}
	// 	lib.Send(node1, nodeId, "testing")
	// }
}
