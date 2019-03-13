import java.io.File;
import java.io.FileNotFoundException;
import java.io.PrintWriter;
import java.util.Scanner;

public class Kolokwium {
	public static void main (String[] args) throws FileNotFoundException {
		File A = new File("A.dat");
		File B = new File("B.dat");
		File C = new File("C.dat");
		
		Scanner scA = new Scanner(A);
		Scanner scB = new Scanner(B);
		PrintWriter pw = new PrintWriter(C);
		
		while(scA.hasNextLine()) {
			Double result;
			result = Double.parseDouble(scA.nextLine())+Double.parseDouble(scB.nextLine());
			pw.println(result);
		}
		pw.flush();
		scA.close();
		scB.close();
		pw.close();
		
		
	}
}
