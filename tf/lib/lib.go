// Web Sockets in Go

package lib

import (
	"bytes"
	"encoding/gob"
	"fmt"
	"math"
	"net"
)

var VECTOR_CLOCK = [3]int32{0, 0, 0}

type Node struct {
	Id     int
	Socket *net.UDPConn
}

type Message struct {
	VectorClock [3]int32
	Message     string
}

func Send(node Node, currentNodeId int, message string) {
	VECTOR_CLOCK[currentNodeId]++
	pkg := Message{VectorClock: VECTOR_CLOCK, Message: message}

	var b bytes.Buffer
	encoder := gob.NewEncoder(&b)
	if err := encoder.Encode(pkg); err != nil {
		panic(err)
	}

	fmt.Printf("Socket sending message: %+v\n", pkg)
	_, err := node.Socket.Write(b.Bytes())
	if err != nil {
		fmt.Println("Error writing data: ", err.Error())
	}
}

func Receive(node Node, currentNodeId int) string {
	var pkg Message
	decoder := gob.NewDecoder(node.Socket)
	decoder.Decode(&pkg)

	fmt.Printf("Received message: %+v\n", pkg)

	// lógica de relógios vetoriais
	VECTOR_CLOCK[currentNodeId]++
	receivedVectorClock := pkg.VectorClock
	VECTOR_CLOCK[0] = maxInt(VECTOR_CLOCK[0], receivedVectorClock[0])
	VECTOR_CLOCK[1] = maxInt(VECTOR_CLOCK[1], receivedVectorClock[1])
	VECTOR_CLOCK[2] = maxInt(VECTOR_CLOCK[2], receivedVectorClock[2])
	fmt.Println("Adjusted received vector clock to:", VECTOR_CLOCK)

	return pkg.Message
}

// Função que simula uma operação local
func LocalInstruction(nodeId int) {
	VECTOR_CLOCK[nodeId]++
}

func maxInt(a, b int32) int32 {
	return int32(math.Max(float64(a), float64(b)))
}

// func Broadcast(nodes []Node, message string) {
// 	for node := range nodes {
// 		Send(nodes[node], message)
// 	}
// }

// func Deliver(nodes []Node) {
// 	for node := range nodes {
// 		Receive(nodes[node])
// 	}
// }
