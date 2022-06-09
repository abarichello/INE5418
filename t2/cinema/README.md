# T2

Demonstração de RMI através de um sistema de reserva de assentos de cinema por interface gráfica e terminal

# Execução:

```
javac *.java
rmiregistry &

# Server
java -Djava.security.manager=allow -Djava.security.policy=server.policy Server

# Cliente interface gráfica
java -Djava.security.manager=allow -Djava.security.policy=server.policy GUI

# Cliente terminal
java -Djava.security.manager=allow -Djava.security.policy=server.policy CLI
```

# Uso & Execução:

Ao rodar o programa o usuário é instruido através das mensagens sobre como utilizá-lo, outras informações como assentos disponíveis também são providenciadas tanto em forma de interface gráfica quanto pelo terminal.
