import java.rmi.RemoteException;
import java.rmi.server.UnicastRemoteObject;
import javax.swing.JOptionPane;

public class Cinema extends UnicastRemoteObject implements ServerInt {

	public SeatManager calendario;
	public SeatManager agenda;
	public int op;

	public Cinema() throws RemoteException {
		calendario = new SeatManager();
		agenda = new SeatManager();
	}

	public void escolheOpcao(int opc) {
		op = opc;
	}

	public void insere(String descricao, String dia) throws RemoteException {
		if (op == 1) {
			calendario.insereMarcacao(descricao, dia);
		} else {
			if (op == 2) {
				agenda.insereMarcacao(descricao, dia);
			} else {
				JOptionPane.showMessageDialog(null, "Insira uma Opção Válida!");
			}
		}
	}

	public String retornaDiaSemana(int a) throws RemoteException {
		String dia;
		if (a == 0) {
			dia = "Segunda";
			return dia;
		} else if (a == 1) {
			dia = "Terca";
			return dia;
		} else if (a == 2) {
			dia = "Quarta";
			return dia;
		} else if (a == 3) {
			dia = "Quinta";
			return dia;
		} else if (a == 4) {
			dia = "Sexta";
			return dia;
		} else if (a == 5) {
			dia = "Sabado";
			return dia;
		} else if (a == 6) {
			dia = "Domingo";
			return dia;
		}
		JOptionPane.showMessageDialog(null, "Erro1");
		return ("ERRO1");
	}

	public String retornaMelhorDia() throws RemoteException {
		int melhorIndice = 0;
		int melhorNumero = 0;
		int frequencia;
		String bestDay;
		for (int a = 0; a < 7; a++) {
			frequencia = agenda.consultaFrequenciaDia(retornaDiaSemana(a));
			if (frequencia >= melhorNumero) {
				melhorNumero = frequencia;
				melhorIndice = a;
			}
		}
		bestDay = retornaDiaSemana(melhorIndice);
		return bestDay;
	}

	public String retornaDescricao(String dia) throws RemoteException {
		String Desc;
		Desc = null;
		if (op == 1) {
			Desc = calendario.consultaDesDiaSemana(dia);
			return Desc;
		} else {
			if (op == 2) {
				Desc = agenda.consultaDesDiaSemana(dia);
				return Desc;
			}
		}
		JOptionPane.showMessageDialog(null, "Erro3");
		return ("Erro3");
	}

	public void removeCalendario(String msg, String dia) throws RemoteException {
		if (op == 1) {
			calendario.retiraMarcacao(msg, dia);
		} else {
			if (op == 2)
				agenda.retiraMarcacao(msg, dia);
		}
	}
}
