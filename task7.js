function removeDuplicates(arr) {
    return [...new Set(arr)];
}

// Example usage:
const numbers = [1, 2, 3, 4, 2, 3, 5, 6, 4, 7];
const uniqueNumbers = [...new Set(numbers)];
console.log(uniqueNumbers); // Output: [1, 2, 3, 4, 5, 6, 7]
