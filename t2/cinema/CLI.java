import java.rmi.Naming;
import java.rmi.RemoteException;
import java.rmi.NotBoundException;
import java.net.MalformedURLException;
import java.util.Scanner;
import java.lang.SecurityManager;

public class CLI {

	public static void main(String args[]) {
		String seatStr = null;
		String aux = null;
		int option = 0;

		Scanner in = new Scanner(System.in);
		if (System.getSecurityManager() == null) {
			System.setSecurityManager(new SecurityManager());
		}

		try {
			ISeatManager seatManager = (ISeatManager) Naming.lookup("//127.0.0.1/cinema");
			var scanner = new Scanner(System.in);

			while (option != 3) {
				System.out.println(
						"Escolha a Opção desejada: \n1-Reservar assento\n2-Consultar assentos disponíveis\n3-Sair");

				aux = scanner.nextLine();
				option = Integer.parseInt(aux);

				var availableSeatsStr = seatManager.availableSeats().toString();

				if (option == 1) {
					System.out.println("Assentos disponíveis:\n" + availableSeatsStr
							+ "\nInsira o assento a ser reservado: (ex: A4)");
					seatStr = scanner.nextLine();
					var result = seatManager.reserveSeat(seatStr);
					if (result) {
						System.out.println("Assento reservado com sucesso");
					} else {
						System.err.println("Erro, assento já reservado");
					}
				} else if (option == 2) {
					System.out.println("Assentos disponíveis:\n" + availableSeatsStr);
				} else if (option == 3) {
					System.out.println("Sair");
					break;
				}
			}
			scanner.close();
			in.close();
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
			System.out.println("Exception: " + e.toString() + "\n" + e.getLocalizedMessage());
			e.printStackTrace();
		}
	}
}
