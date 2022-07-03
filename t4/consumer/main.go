package main

import (
	"context"
	"fmt"
	"log"

	kafka "github.com/segmentio/kafka-go"
)

func calculate(key string, value string) {
	switch key {
	case "+":
		add(value)
	case "-":
		subtract(value)
	case "*":
		multiply(value)
	case "/":
		divide(value)
	}
}

func splitInts(value string) []int {
	integers := [1,2]

	return
}

func add(value string) {
	integers := splitInts(value)
	sum := 0
	for _, i := range integers {
		sum += i
	}
	fmt.Printf("Sum result is %d\n", sum)
}

func subtract(value string) {
	integers := splitInts(value)
	sum := integers[0]
	for k, i := range integers {
		if k != 0 { // skip first
			sum -= i
		}
	}
	fmt.Printf("Sum result is %d\n", sum)
}

func multiply(value string) {
	integers := splitInts(value)
	sum := integers[0]
	for k, i := range integers {
		if k != 0 { // skip first
			sum *= i
		}
	}
}

func divide(value string) {
	integers := splitInts(value)
	dividend := integers[0]
	divisor := integers[1]
	result := dividend / divisor
}

func main() {
	r := kafka.NewReader(kafka.ReaderConfig{
		Brokers:  []string{"localhost:9093"},
		GroupID:  "consumer-group-id",
		Topic:    "test",
		MinBytes: 10e3, // 10KB
		MaxBytes: 10e6, // 10MB
	})

	for {
		m, err := r.ReadMessage(context.Background())
		if err != nil {
			break
		}

		topic := m.Topic
		partition := m.Partition
		offset := m.Offset
		key := string(m.Key)
		value := string(m.Value)
		fmt.Printf("message at topic/partition/offset %v/%v/%v:\nKey: '%s' Value: '%s'\n", topic, partition, offset, key, value)

	}

	if err := r.Close(); err != nil {
		log.Fatal("failed to close reader:", err)
	}
}
