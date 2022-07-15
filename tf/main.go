package main

import (
	"fmt"
	"main/lib"
	"net"
	"os"
	"strconv"

	_ "github.com/joho/godotenv/autoload"
)

func getNodePort(nodeId int) string {
	node0Port := os.Getenv("node0_port")
	node1Port := os.Getenv("node1_port")
	node2Port := os.Getenv("node2_port")

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

func createConnection(port string) net.Conn {
	connection, err := net.Dial("tcp", "localhost:"+port)
	if err != nil {
		panic(err)
	}
	return connection
}

// func receiveConnection(ports []string) net.Conn {
// 	for port := range ports {
// 		connection, err = net.Listen("tcp", "localhost:"+ports[port])
// 		if err != nil {
// 			panic(err)
// 		}
// 	}
// }

func getOtherNodeIds(nodeId int) []int {
	nodes := []int{0, 1, 2}
	return append(nodes[:nodeId], nodes[nodeId+1:]...)
}

func main() {
	totalProcesses := os.Getenv("processes")
	nodeId, _ := strconv.Atoi(os.Args[1])

	fmt.Printf("Started node with id: %d, total processes: %s\n", nodeId, totalProcesses)
	fmt.Println("Starting connections with others nodes")

	otherNodes := getOtherNodeIds(nodeId)
	var nodes []lib.Node
	for otherNodeId := range otherNodes {
		port := getNodePort(otherNodeId)
		node := lib.Node{Id: otherNodeId, Socket: createConnection(port)}
		nodes = append(nodes, node)
	}

	socketA := nodes[0]
	socketB := nodes[1]
	lib.Send(socketA, []byte("teste"))
	lib.Send(socketB, []byte("teste"))
}
