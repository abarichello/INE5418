import java.rmi.Naming;
import java.rmi.RemoteException;
import java.rmi.NotBoundException;
import java.net.MalformedURLException;
import java.util.Scanner;
import javax.swing.JOptionPane;
import java.lang.SecurityManager;

public class GUIClient {

	public static void main(String args[]) {
		String seatStr = null;
		String aux = null;
		int option = 0;
		int opcao1;

		Scanner in = new Scanner(System.in);
		if (System.getSecurityManager() == null) {
			System.setSecurityManager(new SecurityManager());
		}

		try {
			ISeatManager seatManager = (ISeatManager) Naming.lookup("//127.0.0.1/cinema");

			while (option != 3) {
				aux = JOptionPane.showInputDialog(
						"Escolha a Opção desejada: 1-Reservar assento 2-Consultar assentos disponíveis 3-Sair");
				option = Integer.parseInt(aux);

				var availableSeatsStr = seatManager.availableSeats().toString();

				if (option == 1) {
					seatStr = JOptionPane
							.showInputDialog("Assentos disponíveis:\n" + availableSeatsStr
									+ "\nInsira o assento a ser reservado: (ex: A4)");
					var result = seatManager.reserveSeat(seatStr);
					if (result) {
						JOptionPane.showMessageDialog(null, "Assento reservado com sucesso");
					} else {
						JOptionPane.showMessageDialog(null, "Erro, assento já reservado");
					}
				} else if (option == 2) {
					JOptionPane.showMessageDialog(null, "Assentos disponíveis:\n" + availableSeatsStr);
				} else {
					System.out.println("Sair");
					break;
				}
				in.close();
			}
		} catch (MalformedURLException e) {
			System.out.println();
			System.out.println("MalformedURLException: " + e.toString());
		} catch (RemoteException e) {
			System.out.println();
			System.out.println("RemoteException: " + e.toString());
		} catch (NotBoundException e) {
			System.out.println();
			System.out.println("NotBoundException: " + e.toString());
		} catch (Exception e) {
			System.out.println();
			System.out.println("Exception: " + e.toString());
		}
	}
}
