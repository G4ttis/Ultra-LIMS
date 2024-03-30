package ultralims;

import java.util.*;

public class Exercicios {
    public static void main(String[] args) {
    	
        // Teste dos exercícios
        int[] array1 = {5, 3, 4, 3, 5, 5, 3};
        System.out.println("Número não repetido: " + encontrarNumeroUnico(array1));

        String string = "arara";
        System.out.println("É palíndromo? " + verificarPalindromo(string));

        int[] array2 = {3, 1, 2, 4, 6, 5};
        ordenarParesImpares(array2);
        System.out.println("Ordenação de Pares e Ímpares: " + Arrays.toString(array2));

        int numeroFatorial = 5;
        System.out.println("Fatorial de " + numeroFatorial + " é: " + calcularFatorial(numeroFatorial));

        int tamanhoFibonacci = 10;
        System.out.println("Sequência Fibonacci: " + Arrays.toString(gerarFibonacci(tamanhoFibonacci)));
    }

    // Exercício 1: Encontrar número não repetido
    public static int encontrarNumeroUnico(int[] nums) {
        int ones = 0, twos = 0;
        for (int num : nums) {
            ones = (ones ^ num) & ~twos;
            twos = (twos ^ num) & ~ones;
        }
        return ones;
    }

    // Exercício 2: Verificar Palíndromo
    public static boolean verificarPalindromo(String s) {
        int start = 0;
        int end = s.length() - 1;
        while (start < end) {
            if (s.charAt(start) != s.charAt(end))
                return false;
            start++;
            end--;
        }
        return true;
    }

    // Exercício 3: Ordenação de Números Pares e Ímpares
    public static void ordenarParesImpares(int[] nums) {
        int left = 0, right = nums.length - 1;
        while (left < right) {
            while (nums[left] % 2 == 0 && left < right)
                left++;
            while (nums[right] % 2 != 0 && left < right)
                right--;
            if (left < right) {
                int temp = nums[left];
                nums[left] = nums[right];
                nums[right] = temp;
                left++;
                right--;
            }
        }
    }

    // Exercício 4: Calcular Fatorial
    public static int calcularFatorial(int n) {
        if (n == 0)
            return 1;
        return n * calcularFatorial(n - 1);
    }

    // Exercício 5: Sequência Fibonacci
    public static int[] gerarFibonacci(int n) {
        if (n <= 0)
            return new int[0];

        int[] fib = new int[n];
        fib[0] = 1;
        if (n > 1)
            fib[1] = 1;

        for (int i = 2; i < n; i++)
            fib[i] = fib[i - 1] + fib[i - 2];

        return fib;
    }
}

