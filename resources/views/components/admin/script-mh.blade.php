<script>
    function addMh() {
        const mhDiv = document.getElementById('mh_div')
        const mhPlayerDiv = document.getElementById('mh_player_div')
        const mhScreenDiv = document.getElementById('mh_screen_div')

        const mhPlayerDivClone = mhPlayerDiv.cloneNode(true)
        const mhScreenDivClone = mhScreenDiv.cloneNode(true)

        mhPlayerDivClone.children[0].setAttribute('for','player_id_mh_' + (mhDiv.childElementCount / 2 + 1))
        mhPlayerDivClone.children[1].setAttribute('id','player_id_mh_' + (mhDiv.childElementCount / 2 + 1))
        mhPlayerDivClone.children[1].setAttribute('name','player_id_mh_' + (mhDiv.childElementCount / 2 + 1))

        mhScreenDivClone.children[0].setAttribute('for','screen_mh_' + (mhDiv.childElementCount / 2 + 1))
        mhScreenDivClone.children[1].setAttribute('id','screen_mh_' + (mhDiv.childElementCount / 2 + 1))
        mhScreenDivClone.children[1].setAttribute('name','screen_mh_' + (mhDiv.childElementCount / 2 + 1))

        mhDiv.append(mhPlayerDivClone)
        mhDiv.append(mhScreenDivClone)
    }

    function removeMh() {
        const mhDiv = document.getElementById('mh_div')
        const mhPlayerDiv = document.getElementsByClassName('mh_player_div')
        const mhScreenDiv = document.getElementsByClassName('mh_screen_div')

        if(mhPlayerDiv.length > 1) {
            mhDiv.removeChild(mhPlayerDiv[mhPlayerDiv.length - 1])
        }
        if(mhScreenDiv.length > 1) {
            mhDiv.removeChild(mhScreenDiv[mhScreenDiv.length - 1])
        }
    }
</script>
