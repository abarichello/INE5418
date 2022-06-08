# T2

# Execução:

```
javac *.java
rmiregistry &

# Server
java -Djava.security.manager=allow -Djava.security.policy=server.policy Server

# Cliente
java -Djava.security.manager=allow -Djava.security.policy=server.policy Client
```
