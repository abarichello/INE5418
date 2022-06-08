import java.rmi.RemoteException;
import java.lang.String;
import javax.swing.JOptionPane;

public class SeatManager {
	boolean seats[][];
	String filmName;

	int ROWS = 8;
	int COLUMNS = 10;

	public SeatManager(String filmName) throws RemoteException {
		seats = new boolean[ROWS][COLUMNS];
		this.filmName = filmName;
		initializeSeats();
	}

	private int rowToInt(String row) {
		switch (row) {
			case "A":
				return 0;
			case "B":
				return 1;
			case "C":
				return 2;
			case "D":
				return 3;
			case "E":
				return 4;
			case "F":
				return 5;
			case "G":
				return 6;
			case "H":
				return 7;
			default:
				return -1;
		}
	}

	private void initializeSeats() {
		for (int i = 0; i < ROWS; i++) {
			for (int j = 0; j < COLUMNS; j++) {
				seats[i][j] = false;
			}
		}
	}

	private Integer[] seatStringToTuple(String seat) {
		var list = new Integer[2];
		list[0] = this.rowToInt(seat.substring(0, 1));
		list[1] = Integer.parseInt(seat.substring(1, 2));
		return list;
	}

	private boolean checkAvailableSeat(int row, int column) {
		return seats[row][column];
	}

	private void markSeat(int row, int column) {
		seats[row][column] = true;
	}

	public boolean reserveSeat(String seatStr) {
		var seatInfo = seatStringToTuple(seatStr);
		var row = seatInfo[0];
		var column = seatInfo[1];
		var seatStatus = checkAvailableSeat(row, column);
		if (!seatStatus) {
			markSeat(row, column);
			return true;
		} else {
			JOptionPane.showMessageDialog(null, "Erro, assento já foi pego");
			return false;
		}
	}

	public boolean[][] availableSeats() {
		return seats;
	}
}
