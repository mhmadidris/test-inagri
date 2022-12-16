<div class="w-full flex place-content-center place-items-center">
    <div class="border-2 border-gray-400 border-dotted w-80 h-80 overflow-hidden rounded-xl">
        <img src="{{ asset('assets/images/empty-illustration.svg') }}" id="output" class="w-full h-full bg-cover" />
    </div>
</div>
<input type="file" accept="image/*" onchange="loadFile(event)" name="image" id="image" class="my-2" required>

<script>
    function showHide(ele) {
        var srcElement = document.getElementById(ele);
        if (srcElement != null) {
            if (srcElement.style.display == "block") {
                srcElement.style.display = 'none';
            } else {
                srcElement.style.display = 'block';
            }
            return false;
        }
    };

    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };

</script>
