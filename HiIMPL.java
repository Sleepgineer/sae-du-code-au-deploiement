// Implémentation de l'objet

import java.rmi.server.*;
import java.rmi.*;

public class HiIMPL extends UnicastRemoteObject implements Hi {
    public HiIMPL() throws RemoteException {};
    public String sayHi(String name)  {
        return "Hi" + name;
    };
};