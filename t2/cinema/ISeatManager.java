import java.rmi.Remote;
import java.rmi.RemoteException;
import java.util.ArrayList;

public interface ISeatManager extends Remote {

    public boolean isSeatAvailable(int row, int column) throws RemoteException;

    public boolean reserveSeat(String seatStr) throws RemoteException;

    public ArrayList<String> availableSeats() throws RemoteException;
}
