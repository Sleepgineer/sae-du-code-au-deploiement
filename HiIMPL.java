import java.rmi.server.*;
import java.rmi.*;

public class HiIMPL implements Hi {
    public HiIMPL() throws RemoteException {};
    public String sayHi(String name)  {
        return "Hi" + name;
    };
};