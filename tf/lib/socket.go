package lib

import (
	"fmt"
	"net"
	"os"
)

func CreateConnection(port string) *net.UDPConn {
	fmt.Println("Creating connection...")

	connection, err := net.ResolveUDPAddr("udp", "localhost:"+port)
	if err != nil {
		fmt.Println("Error resolving UDP Address", err.Error())
	}

	server, err := net.ListenUDP("udp", connection)
	if err != nil {
		fmt.Println("Error listening to connections", err.Error())
	}

	return server
}

func ReceiveConnection(port string) *net.UDPConn {
	fmt.Println("Receiving connection...")
	udpAddr, err := net.ResolveUDPAddr("udp", "localhost:"+port)
	if err != nil {
		fmt.Println("Error resolving UDP Address: ", err.Error())
		os.Exit(1)
	}

	client, err := net.ListenUDP("udp", udpAddr)
	if err != nil {
		fmt.Println("Error listening: ", err.Error())
		os.Exit(1)
	}

	fmt.Println("Connected to port", port)

	return client

}
