import java.rmi.RemoteException;
import java.rmi.server.UnicastRemoteObject;
import java.util.ArrayList;

public class Cinema extends UnicastRemoteObject implements ISeatManager {

	public SeatManager seatManager;

	public Cinema() throws RemoteException {
		seatManager = new SeatManager("filme");
	}

	public boolean isSeatAvailable(int row, int column) throws RemoteException {
		return seatManager.seats[row][column];
	}

	public boolean reserveSeat(String seatStr) throws RemoteException {
		var seatInfo = seatManager.seatStringToTuple(seatStr);
		var row = seatInfo[0];
		var column = seatInfo[1];
		var seatStatus = isSeatAvailable(row, column);
		if (!seatStatus) {
			seatManager.markSeat(row, column);
			return true;
		} else {
			System.out.println("Erro tentando reservar assento já marcado");
			return false;
		}
	}

	public ArrayList<String> availableSeats() throws RemoteException {
		return seatManager.availableSeats();
	}

}
