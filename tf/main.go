package main

import (
	"fmt"
	"main/lib"
	"os"
	"strconv"

	_ "github.com/joho/godotenv/autoload"
)

var (
	node0Port = os.Getenv("node0_port")
	node1Port = os.Getenv("node1_port")
	node2Port = os.Getenv("node2_port")
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
	nodes := []int{0, 1, 2}
	return append(nodes[:nodeId], nodes[nodeId+1:]...)
}

func main() {
	totalProcesses := os.Getenv("processes")
	nodeId, _ := strconv.Atoi(os.Args[1])

	fmt.Printf("Started node with id: %d, total processes: %s\n", nodeId, totalProcesses)
	fmt.Println("Starting connections with others nodes")

	// otherNodes := getOtherNodeIds(nodeId)
	if nodeId == 0 {
		node0 := lib.Node{Id: 0, Socket: lib.ReceiveConnection(node0Port)}
		msg := lib.Receive(node0)
		fmt.Println("Received message", msg)
	} else if nodeId == 1 {
		node1 := lib.Node{Id: 1, Socket: lib.CreateConnection(node0Port)}
		lib.Send(node1, []byte("testing"))
	}
}
