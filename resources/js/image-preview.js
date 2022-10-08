function upload(){
    var img = document.getElementById('image')
    var input = document.getElementById('input')

    const oFReader = new FileReader()
    oFReader.readAsDataURL(input.files[0])

    oFReader.onload = function(oFREvent){
        img.src = oFREvent.target.result
    }
}