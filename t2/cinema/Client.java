import java.rmi.Naming;
import java.rmi.RemoteException;
import java.rmi.NotBoundException;
import java.net.MalformedURLException;
import java.util.Scanner;
import javax.swing.JOptionPane;
import java.lang.SecurityManager;

public class Client {

	public static void main(String args[]) {
		String dia = null;
		String des = null;
		String aux = null;
		int opcao = 0;
		int opcao1;

		Scanner in = new Scanner(System.in);
		if (System.getSecurityManager() == null) {
			System.setSecurityManager(new SecurityManager());
		}

		try {
			ServerInt m = (ServerInt) Naming.lookup("//127.0.0.1/cinema");

			while (opcao != 3) {
				aux = JOptionPane.showInputDialog("Escolha a Opção desejada: 1- Calendario 2- Agenda 3-Sair");
				opcao = Integer.parseInt(aux);
				m.escolheOpcao(opcao);

				if (opcao == 3)
					break;

				if (opcao == 1) {
					aux = JOptionPane.showInputDialog(
							"O que você deseja fazer? 1-Inserir Compromisso 2-Verificar Compromissos 3-Excluir Compromissos");
					opcao1 = Integer.parseInt(aux);
					if (opcao1 == 1) {
						des = JOptionPane.showInputDialog("Insira o Compromisso");
						dia = JOptionPane.showInputDialog("Insira o dia do Compromisso com a primeira letra Maiuscula");
						m.insere(des, dia);
					} else {
						if (opcao1 == 2) {
							dia = JOptionPane.showInputDialog("Insira o Dia da Semana com a primeira letra Maiuscula");
							String aux111 = "";
							aux111 = m.retornaDescricao(dia);
							JOptionPane.showMessageDialog(null, aux111);
						} else {
							if (opcao1 == 3) {
								dia = JOptionPane
										.showInputDialog("Insira o Dia da Semana com a primeira letra Maiuscula");
								des = JOptionPane.showInputDialog("Insira o Compromisso que Deseja Excluir");
								m.removeCalendario(des, dia);
							} else {
								JOptionPane.showMessageDialog(null, "Opcao Invalida");
							}
						}
					}
				} else {
					aux = JOptionPane.showInputDialog(
							"O que você deseja fazer? 1-Inserir dia Disponivel 2-Verificar Dia 3-Verificar Melhor Dia 4-Excluir dia Disponível ");
					opcao1 = Integer.parseInt(aux);

					if (opcao1 == 1) {
						des = JOptionPane.showInputDialog("Insira o seu Nome");
						dia = JOptionPane.showInputDialog(
								"Insira o dia da semana(com a primeira letra maiuscula) do Compromisso");
						m.insere(des, dia);
					} else {
						if (opcao1 == 2) {
							dia = JOptionPane.showInputDialog("Insira o Dia(com a primeira letra maiuscula)");
							String aux1 = "";
							aux1 = m.retornaDescricao(dia);
							JOptionPane.showMessageDialog(null, aux1);
						} else {
							if (opcao1 == 3) {
								String aux11 = "";
								aux11 = m.retornaMelhorDia();
								JOptionPane.showMessageDialog(null, aux11);
							} else {
								if (opcao1 == 4) {
									des = JOptionPane.showInputDialog("Insira o seu Nome");
									dia = JOptionPane.showInputDialog("Insira o dia da semana que quer desmarcar");
									m.removeCalendario(des, dia);
								} else
									JOptionPane.showMessageDialog(null, "Opcao Invalida");
							}
						}
					}
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
