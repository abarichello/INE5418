package main

import (
	"context"
	"log"

	kafka "github.com/segmentio/kafka-go"
)

func main() {
	w := &kafka.Writer{
		Addr:     kafka.TCP("localhost:9093"),
		Topic:    "test",
		Balancer: &kafka.LeastBytes{},
	}

	err := w.WriteMessages(context.Background(),
		// Examples
		kafka.Message{
			Key:   []byte("+"),
			Value: []byte("2 2"),
		},
		kafka.Message{
			Key:   []byte("-"),
			Value: []byte("2 2"),
		},
		kafka.Message{
			Key:   []byte("*"),
			Value: []byte("2 2"),
		},
		kafka.Message{
			Key:   []byte("/"),
			Value: []byte("2 2"),
		},
	)
	if err != nil {
		log.Fatal("failed to write messages:", err)
	}

	if err := w.Close(); err != nil {
		log.Fatal("failed to close writer:", err)
	}

}
