const arr = [1, 2, 3, 4, 5]
function duplicate(arr, times) {
    let rez = [...arr]
    for (let i=1;i<times;i++){
        rez = [...rez,...arr]
    }
    return rez
}

console.log(duplicate(arr,3))