// Interface pour tester

import java.rmi.*;

public interface Hi extends Remote {
    String sayHi(String name) throws RemoteException;
}
