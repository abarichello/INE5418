import java.rmi.RemoteException;
import java.util.ArrayList;
import java.lang.String;

public class SeatManager {
	public boolean seats[][];
	String filmName;

	int ROWS = 6;
	int COLUMNS = 5;

	public SeatManager(String filmName) throws RemoteException {
		seats = new boolean[ROWS][COLUMNS];
		this.filmName = filmName;
		initializeSeats();
	}

	private void initializeSeats() {
		for (int i = 0; i < ROWS; i++) {
			for (int j = 0; j < COLUMNS; j++) {
				seats[i][j] = false;
			}
		}
	}

	public void markSeat(int row, int column) {
		seats[row][column] = true;
	}

	public Integer[] seatStringToTuple(String seat) {
		var list = new Integer[2];
		list[0] = this.rowToInt(seat.substring(0, 1));
		list[1] = Integer.parseInt(seat.substring(1, 2));
		return list;
	}

	public ArrayList<String> availableSeats() {
		var list = new ArrayList<String>();
		for (int i = 0; i < ROWS; i++) {
			for (int j = 0; j < COLUMNS; j++) {
				if (!seats[i][j]) {
					list.add(intToRow(i) + Integer.toString(j));
				}
			}
		}
		return list;
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

	private String intToRow(int i) {
		switch (i) {
			case 0:
				return "A";
			case 1:
				return "B";
			case 2:
				return "C";
			case 3:
				return "D";
			case 4:
				return "E";
			case 5:
				return "F";
			case 6:
				return "G";
			case 7:
				return "H";
			default:
				return "";
		}
	}

}
