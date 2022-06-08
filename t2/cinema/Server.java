import java.rmi.Naming;
import java.rmi.RMISecurityManager;
import java.lang.SecurityManager;

// Executar:
// java -Djava.security.policy=server.policy Server

public class Server {

    public Server() {
        if (System.getSecurityManager() == null) {
            // System.setSecurityManager(new RMISecurityManager());
            System.setSecurityManager(new SecurityManager());
        }
        try {
            System.setProperty("java.rmi.server.hostname", "127.0.0.1");
            Naming.rebind("//127.0.0.1/cinema", new Cinema());
        } catch (Exception e) {
            System.out.println("Trouble: " + e);
        }
    }

    public static void main(String[] args) {
        new Server();
    }
}
