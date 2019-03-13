import java.io.File;
import java.io.FileNotFoundException;
import java.util.Scanner;

public class Wyjatki {
	public static void main(String[] args) {
		//Try with resources
		try(Scanner sc = new Scanner(new File("A.dat"))) {
			
		} catch(FileNotFoundException e) {
			System.out.println("File not found");
		}
		
		
		
		
		
		
		
		
		
		
		
		
		//Try with finally
		/*Scanner sc=null;
		try {
			sc = new Scanner(new File("A.dat"));
		} catch (FileNotFoundException e1) {
			System.out.println("File not found");
		} finally {
			sc.close();
		}*/
		
		
		

		
	}
}
