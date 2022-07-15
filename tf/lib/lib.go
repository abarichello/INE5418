// Web Sockets in Go

package lib

import (
	"bytes"
	"encoding/binary"
	"fmt"
	"net"
)

var VECTOR_CLOCK = [3]int32{0, 0, 0}

type Node struct {
	Id     int
	Socket net.Conn
}

func Send(node Node, message []byte) {
	buf := new(bytes.Buffer)
	for clock := range VECTOR_CLOCK {
		fmt.Printf("Writing %d to buffer\n", clock)
		binary.Write(buf, binary.LittleEndian, &clock)
	}

	fmt.Printf("Wrote vector clock to buffer: %s\n", buf.String())

	_, err := node.Socket.Write(message)
	if err != nil {
		fmt.Println("Error writing data: ", err.Error())
	}
}

func Receive(node Node) []byte {
	var msg []byte
	_, err := node.Socket.Read(msg)

	if err != nil {
		fmt.Println("Error reading data: ", err.Error())
	}

	return msg
}

func Broadcast(nodes []Node, message []byte) {
	for node := range nodes {
		Send(nodes[node], message)
	}
}

func Deliver(nodes []Node) {
	for node := range nodes {
		Receive(nodes[node])
	}
}
