package lib

import (
	"fmt"
	"net"
	"os"
)

func CreateConnection(port string) net.Conn {
	fmt.Println("Creating connection...")
	connection, err := net.Dial("tcp", "localhost:"+port)
	if err != nil {
		panic(err)
	}
	return connection
}

func ReceiveConnection(port string) net.Conn {
	fmt.Println("Receiving connection...")
	server, err := net.Listen("tcp", "localhost:"+port)
	if err != nil {
		fmt.Println("Error listening: ", err.Error())
		os.Exit(1)
	}

	connection, err := server.Accept()
	if err != nil {
		fmt.Println("Error accepcting connection: ", err.Error())
		os.Exit(1)
	}

	fmt.Println("Connected to port", port)

	return connection

}
