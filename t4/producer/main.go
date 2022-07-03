package main

import (
	"bufio"
	"context"
	"fmt"
	"log"
	"os"
	"strings"

	kafka "github.com/segmentio/kafka-go"
)

func extractOperation(str string) string {
	if strings.Contains(str, "+") {
		return "+"
	} else if strings.Contains(str, "-") {
		return "-"
	} else if strings.Contains(str, "*") {
		return "*"
	} else if strings.Contains(str, "/") {
		return "/"
	} else {
		log.Panic("Unsupported operation found on input")
	}
	return ""
}

func closeKafka(w *kafka.Writer) {
	if err := w.Close(); err != nil {
		log.Fatal("failed to close writer:", err)
	}
}

func main() {
	w := &kafka.Writer{
		Addr:     kafka.TCP("localhost:9093"),
		Topic:    "test",
		Balancer: &kafka.LeastBytes{},
	}
	defer closeKafka(w)

	fmt.Println("Calculator.")
	fmt.Println("Operations supported: +, -, *, /")
	fmt.Println("Mixing multiple operators is not supported")

	for {
		fmt.Println("Type the operation that you want to send to the consumer with spaces between the operands. Ex: 2 + 2 + 3")
		scanner := bufio.NewScanner(os.Stdin)
		scanner.Scan()
		err := scanner.Err()
		if err != nil {
			log.Fatal(err)
		}
		txt := scanner.Text()
		operation := extractOperation(txt)
		fmt.Printf("Input read: %s\nOperation detected: %s\n", txt, operation)
		operators := strings.ReplaceAll(txt, operation, "")
		operators = strings.ReplaceAll(operators, "  ", " ")

		err = w.WriteMessages(context.Background(),
			kafka.Message{
				Key:   []byte(operation),
				Value: []byte(operators),
			})

		// Message examples
		// kafka.Message{
		// 	Key:   []byte("+"),
		// 	Value: []byte("2 2"),
		// },
		// kafka.Message{
		// 	Key:   []byte("-"),
		// 	Value: []byte("2 2"),
		// },
		// kafka.Message{
		// 	Key:   []byte("*"),
		// 	Value: []byte("2 2"),
		// },
		// kafka.Message{
		// 	Key:   []byte("/"),
		// 	Value: []byte("2 2"),
		// },

		if err != nil {
			log.Fatal("failed to write messages:", err)
		}

		fmt.Println("Message was sent successfully, preparing to send next operation...")
		fmt.Println("")
	}

}
