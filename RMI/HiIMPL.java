// Implémentation de l'objet

import java.rmi.server.*;
import java.rmi.*;

public class HiIMPL extends UnicastRemoteObject implements Hi {
    public HiIMPL() throws RemoteException {};
    public String sayHi(String name) {
        return "Hi " + name;
    }
    public int somme(int a, int b) {
        return a + b;
    }
    public int sayHello(String name) {
        return a + b;
    }
}