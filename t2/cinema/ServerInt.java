import java.rmi.Remote;
import java.rmi.RemoteException;

public interface ServerInt extends Remote {

    public String retornaMelhorDia() throws RemoteException;

    public String retornaDescricao(String dia) throws RemoteException;

    public void removeCalendario(String msg, String dia) throws RemoteException;

    public void escolheOpcao(int opc) throws RemoteException;

    public void insere(String descricao, String dia) throws RemoteException;

}
