// Client RMI

import java.rmi.*;

public class Client {
    public static void main(String[] args) throws Exception {
        Hi stub = (Hi) Naming.lookup("rmi://localhost/Hi");
        System.out.println(stub.sayHi("Bob"));
    }
}