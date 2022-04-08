const handleButton = () => {
    let state = document.getElementById('postmaker-button').style.display;

    if(state == 'block')
    {
        document.getElementById('postmaker-button').style.display = 'none';
        document.getElementById('postmaker').style.display = 'block';
    }
    else
    {
        document.getElementById('postmaker-button').style.display = 'block';
        document.getElementById('postmaker').style.display = 'none';
    }
}

document.getElementById('postmaker-button').addEventListener('click', handleButton);
document.getElementById('close').addEventListener('click', handleButton);
