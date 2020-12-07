function ucfirst(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function sortById(arr) {
    arr.sort(function (a, b) {
        return a.id - b.id;
    });
}
function randAvatar() {
    let avatar = [ "1.jpg", "2.png","3.png","4.jpg","5.jpg",];
    return avatar[Math.floor(Math.random()*avatar.length)];
}