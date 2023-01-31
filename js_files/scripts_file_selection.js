function LoadFile() {
    var input = document.querySelector('.input_file')

    var label = input.nextElementSibling
    var labelVal = label.innerHTML

    input.addEventListener('change', function(e) {
        var fileName = ''
        fileName = this.files[0].name
        document.querySelector('#file_name').innerHTML = fileName
         
    })        

}

document.addEventListener('DOMContentLoaded', LoadFile())