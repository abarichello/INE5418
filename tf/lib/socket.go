package lib

import (
	"fmt"
	"net"
	"os"
)

func CreateConnection(port string) *net.UDPConn {
	fmt.Println("Creating connection on port ", port)

	connection, err := net.ResolveUDPAddr("udp", "localhost:"+port)
	if err != nil {
		fmt.Println("Error resolving UDP Address", err.Error())
	}

	server, err := net.ListenUDP("udp", connection)
	if err != nil {
		fmt.Println("Error listening to connections", err.Error())
	}
	defer server.Close()

	return server
}

func ReceiveConnection(localPort string, remotePort string) *net.UDPConn {

	remoteConnectionAddress := "localhost:" + remotePort
	localConnectionAddress := "localhost:" + localPort

	remoteConnection, err := net.ResolveUDPAddr("udp", remoteConnectionAddress)
	if err != nil {
		fmt.Println("Error resolving remote UDP Address: ", err.Error())
		os.Exit(1)
	}

	localConnection, err := net.ResolveUDPAddr("udp", localConnectionAddress)
	if err != nil {
		fmt.Println("Error resolving local UDP Address: ", err.Error())
		os.Exit(1)
	}

	client, err := net.DialUDP("udp", localConnection, remoteConnection)
	if err != nil {
		fmt.Println("Error listening to connections: ", err.Error())
		os.Exit(1)
	}
	defer client.Close()

	return client

}
