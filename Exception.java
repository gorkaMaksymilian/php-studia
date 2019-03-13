import java.io.File;
import java.io.FileNotFoundException;
import java.util.NoSuchElementException;
import java.util.Scanner;
import java.util.StringTokenizer;

public class ReadDataException {
	public static void main(String...strings) {
		try {
			readFile("ludzie.dat");
		} catch (NoYearProvidedException e) {
			System.out.println("Missing year.");
			//e.printStackTrace();
			//System.out.println(e.getMessage());
		}
		
		
		
		
		
		
	}
	
	private static void readFile(String path) throws NoYearProvidedException {
		try(Scanner sc = new Scanner(new File(path))) {
			
			String name,surname;
			int year;
			
			while (sc.hasNextLine()) {
				String line = sc.nextLine();
				StringTokenizer st = new StringTokenizer(line);
				
				name = st.nextToken();
				surname = st.nextToken();
				try {
					year = Integer.parseInt(st.nextToken());
				} catch (NoSuchElementException e) {
					throw new NoYearProvidedException();

				}
				
				System.out.println(name+" "+surname+" "+year);
				
			}
			
		} catch (FileNotFoundException e) {
			System.out.println("File not found");
		} /*catch (NoSuchElementException e) {
			System.out.println("rip");
		}*/
	}



}

class NoYearProvidedException extends Exception {
	public NoYearProvidedException() {
		super("Missing data.");
		
	}
}

























