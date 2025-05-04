<!DOCTYPE html>
<html>
<head>
    <title>URI Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            max-width: 800px;
        }
        select {
            padding: 8px;
            margin-bottom: 15px;
            width: 100%;
        }
        .url-display {
            background-color: #f5f5f5;
            padding: 10px;
            font-family: monospace;
            word-break: break-all;
            margin-top: 20px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h1>URI Test</h1>
    
    <div>
        <label for="select1">First Selection:</label>
        <select id="select1" onchange="updateURL()">
            <option value="">Select first option</option>
            <option value="test1">Test 1</option>
            <option value="option1">Option 1</option>
            <option value="alpha">Alpha</option>
        </select>
    </div>
    <div>
        <label for="select2">Second Selection:</label>
        <select id="select2" onchange="updateURL()">
            <option value="">Select second option</option>
            <option value="test2">Test 2</option>
            <option value="option2">Option 2</option>
            <option value="beta">Beta</option>
        </select>
    </div>
    <div>
        <label for="select3">Third Selection:</label>
        <select id="select3" onchange="updateURL()">
            <option value="">Select third option</option>
            <option value="test3">Test 3</option>
            <option value="option3">Option 3</option>
            <option value="gamma">Gamma</option>
        </select>
    </div>
    <div>
        <label for="select4">Fourth Selection:</label>
        <select id="select4" onchange="updateURL()">
            <option value="">Select fourth option</option>
            <option value="test4">Test 4</option>
            <option value="option4">Option 4</option>
            <option value="delta">Delta</option>
        </select>
    </div>
    <div class="url-display">
        <p>Current URL: <span id="currentUrl"></span></p>
        <div>
            <input type="text" id="manualUrl" style="width: 70%; padding: 8px; margin-right: 10px;" placeholder="Edit URL path manually">
            <button onclick="applyManualUrl()">Apply URL</button>
        </div>
    </div>

    <script>
        // get url param
        function initFromURL() {
            const path = window.location.pathname;
            const parts = path.split('/');
            
            
            const testIndex = parts.findIndex(part => part === 'test.php');
            
            if (testIndex >= 0) {
                // get values test.php
                const select1Value = parts[testIndex + 1] || '';
                const select2Value = parts[testIndex + 2] || '';
                const select3Value = parts[testIndex + 3] || '';
                const select4Value = parts[testIndex + 4] || '';
                
                // set select values
                setSelectValueIfExists('select1', select1Value);
                setSelectValueIfExists('select2', select2Value);
                setSelectValueIfExists('select3', select3Value);
                setSelectValueIfExists('select4', select4Value);
                
                
                updateSelectStates();
            }
            document.getElementById('currentUrl').textContent = window.location.pathname;
            document.getElementById('manualUrl').value = window.location.pathname;
        }
        function setSelectValueIfExists(selectId, value) {
            const select = document.getElementById(selectId);
            if (!value) return;
            
            // Check if value exists in options
            for (let i = 0; i < select.options.length; i++) {
                if (select.options[i].value === value) {
                    select.value = value;
                    return;
                }
            }
        }



        function updateSelectStates() {
            const select1 = document.getElementById('select1');
            const select2 = document.getElementById('select2');
            const select3 = document.getElementById('select3');
            const select4 = document.getElementById('select4');
            
            
            select2.disabled = !select1.value;
            select3.disabled = !select2.value || !select1.value;
            select4.disabled = !select3.value || !select2.value || !select1.value;
            
           




            if (!select1.value) {
                select2.value = '';
                select3.value = '';
                select4.value = '';
            } else if (!select2.value) {
                select3.value = '';
                select4.value = '';
            } else if (!select3.value) {
                select4.value = '';
            }
        }
        
        
        
        function updateURL() {
            

            updateSelectStates();
            const select1Value = document.getElementById('select1').value;
            const select2Value = document.getElementById('select2').value;
            const select3Value = document.getElementById('select3').value;
            const select4Value = document.getElementById('select4').value;


            let parts = [];

            if (select1Value) parts.push(select1Value);
            if (select2Value) parts.push(select2Value);
            if (select3Value) parts.push(select3Value);
            if (select4Value) parts.push(select4Value);
            
            
            let newPath = '/test.php';
            if (parts.length > 0) {
                newPath += '/' + parts.join('/');
            }
            
            console.log('Updating URL to:', newPath);
            
            try {
               
                window.history.pushState({}, '', newPath);
                document.getElementById('currentUrl').textContent = window.location.pathname;
                document.getElementById('manualUrl').value = window.location.pathname;
            } catch (e) {
                console.error('Error updating URL:', e);
            }
        }
        
        

        
        // listen for event handler
        window.addEventListener('popstate', function() {
            initFromURL();
        });
        
        document.addEventListener('DOMContentLoaded', function() {
            initFromURL();
            


            document.getElementById('manualUrl').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    applyManualUrl();
                }
            });
        });
        
        function applyManualUrl() {
            const manualUrl = document.getElementById('manualUrl').value;
            
            
            
            
            if (manualUrl.includes('test.php')) {
                try {
                    window.history.pushState({}, '', manualUrl);
                    initFromURL();
                } catch (e) {
                    console.error('Error updating URL:', e);
                    alert('Invalid URL format');
                }
            } else {
                alert('URL must contain test.php');
            }
        }
    </script>
</body>
</html> 