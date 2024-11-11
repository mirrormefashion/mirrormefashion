/**
 * Chat Bot Script
 * This script handles user interactions and collects information for a chat bot.
 */

// DOM elements

const chatBody = document.getElementById('chatBody');
const userInput = document.getElementById('userInput');
const sendBtn = document.getElementById('sendBtn');


// if (chatBody == null) {
//     alert(`'Please add this html code to show your chat bot!',<div class="chat_box">
//     <div class="chat_box_main">
//         <div class="chat_box_header">
//             <div class="sophia_pic">
//                 <img src="images/sophia.png" alt="">
//             </div>

//         </div>
//         <div id="chatBody" class="chat_body" style="color: #990000;">
//             <div class="talk_bubble">
//                 Hi there guest visitor! I’m Sophia, your Virtual Fashion Stylist! Are you female, male or non-binary?
//             </div>
//         </div>
//     </div>
//     <div class="chat_box_footer">
//         <input type="text" id="userInput" placeholder="Enter your response here">
//         <button id="sendBtn">Send</button>
//     </div>
// </div>`);
// }
// Event listeners
if (sendBtn != null) {
    sendBtn.addEventListener('click', sendMessage);
    userInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            sendMessage();
        }
    });
}

// User responses object to store user input data
var userResponses = {
    "gender": "female",
    "name": "zahedul islam",
    "age_range": "19 - 39",
    "height": 64,
    "weight": 150,
    "bmi": "23.4",
    "shoeSize": {
        "size": 10,
        "category": "mens"
    },
    "braSize": {
        "vol": "32",
        "band": "C"
    }
}


// Current state variables
var currentQuestion = 1;
var userSex;
var currentHeight;

/**
 * Function to store a new user response
 * @param {string} userResponse - The user's response.
 */
function storeUserResponse(key, value) {
    // Store the user response in the userResponses object
    userResponses[key] = value;
}

/**
 * Send a message based on user input.
 */
function sendMessage() {
    const userMessage = userInput.value.trim();

    if (!userMessage && currentQuestion !== 3) {
        alert('This field should not be empty!');
        return;
    }

    if (currentQuestion === 3) {
        const selectedAge = getAge();
        if (!selectedAge) {
            alert('Please select your age!');
            return;
        }
        appendMessage('user', `${selectedAge} years of age`);
        userInput.value = '';
    } else {
        appendMessage('user', userMessage);
    }

    userInput.value = '';

    const botResponse = getBotResponse(userMessage);
    setTimeout(() => {
        appendMessage('bot', botResponse);
    }, 500);
}



/**
 * Process user input and determine the bot's response.
 * @param {string} userMessage - The user's message.
 * @returns {string|Array} - The bot's response.
 */
function getBotResponse(userMessage) {
    switch (currentQuestion) {
        case 1:
            return processGenderInput(userMessage);
        case 2:
            return processNameInput(userMessage);
        case 3:
            return processAgeInput();
        case 4:
            return processHeightInput(userMessage);
        case 5:
            return processWeightInput(userMessage);
        case 6:
            return processShoeSizeInput(userMessage);
        case 7:
            return processBraSizeInput(userMessage);

            // Add cases for other questions...
        default:
            return 'I do not recognize your input.';
    }
}
/**
 * Append a message to the chat.
 * @param {string} sender - The sender of the message (user or bot).
 * @param {string|Array} messages - The message or an array of messages to append.
 */
function appendMessage(sender, messages) {
    if (!Array.isArray(messages)) {
        messages = [messages];
    }

    messages.forEach((message) => {
        const messageClass = sender === 'user' ? 'user_reply' : 'talk_bubble';
        const messageElement = document.createElement('div');
        messageElement.className = messageClass;
        messageElement.innerHTML = message;
        chatBody.appendChild(messageElement);
    });

    setTimeout(() => {
        scrollToBottom(chatBody, 1000);
    }, 1500);
}


/**
 * Process gender input and move to the next question.
 * @param {string} userMessage - The user's gender input.
 * @returns {string} - The bot's response.
 */
function processGenderInput(userMessage) {
    const validGenders = ['male', 'female', 'nonbinary'];

    if (validGenders.includes(userMessage.toLowerCase())) {
        userSex = userMessage.toLowerCase();
        storeUserResponse('gender', userSex);
        currentQuestion = 2;

        // Get the height of the entire document
        return `
        What is your full name ? `;
    } else {
        return `
        I do not recognize your input.Please say female, male, or non - binary.
        `;
    }
}





/**
 * Process name input and move to the next question.
 * @param {string} userMessage - The user's name input.
 * @returns {string} - The bot's response.
 */
function processNameInput(userMessage) {
    const name = userMessage.split(" ");
    if (name.length > 1) {
        storeUserResponse('name', userMessage);
        currentQuestion = 3;
        return [`Nice name,${userMessage}!`, `<div class="age_grup">
        <label class="age_grup_tittle">
            Choose your age group and then click the submit button.
        </label>
        <div class="age_grup_body">
        <input type="radio" id="age1" name="age" value="Under 19">
        <label for="age1">Under 19</label><br>
        <input type="radio" id="age2" name="age" value="19 - 39">
        <label for="age2">19 - 39</label><br>
        <input type="radio" id="age3" name="age" value="40 - 64">
        <label for="age3">40 - 64</label><br>
        <input type="radio" id="age4" name="age" value="Over 65">
        <label for="age4">Over 65</label>
        </div>
    </div>`];
    } else {
        return `Please enter your first and last name.`;
    }
}

/**
 * Process age input.
 * @returns {string|boolean} - The selected age range or false if not selected.
 */
function processAgeInput() {
    const selectedAge = getAge();
    if (selectedAge) {
        storeUserResponse('age_range', selectedAge);
        currentQuestion = 4;
        return [`Great, thanks!`, `Please enter your height in inches.`];
    } else {
        return 'Please select your age!';
    }
}

/**
 * Process height input and move to the next question.
 * @param {string} userMessage - The user's height input.
 * @returns {string} - The bot's response.
 */
function processHeightInput(userMessage) {
    const result = getHeight(userMessage);
    if (result.error) {
        return result.message
    } else {
        storeUserResponse('height', result.message);
        currentHeight = result.message;
        currentQuestion = 5;
        return 'What is your weight?';
    }

}

/**
 * Process weight input and move to the next question.
 * @param {string} userMessage - The user's weight input.
 * @returns {string} - The bot's response.
 */
function processWeightInput(userMessage) {

    const result = getWeight(userMessage);
    if (result.error) {
        return result.message
    } else {
        storeUserResponse('weight', result.message);
        storeUserResponse('bmi', calculateBMI(result.message, currentHeight));

        currentQuestion = 6;
        return 'What is your U.S. shoe size? Format by U.S. size and group. For example, 8.5 womens, 10 mens, or 4.5 kids.?';
    }


}



/**
 * Process shoe size input and move to the next question.
 * Parses the user input to determine U.S. shoe size and category (kids, womens, mens).
 * @param {string} userMessage - The user input containing the size and category (e.g., '8.5 womens').
 * @returns {string} - A message indicating the recognized shoe size and category.
 */
function processShoeSizeInput(userMessage) {
    const result = getShoeSize(userMessage);

    if (result.error) {
        // Handle the error message
        return result.message;
    } else {
        const { size, category } = result;
        storeUserResponse('shoeSize', { size, category });
        // Handle the valid shoe size
        currentQuestion = 7;

        return `Your U.S. shoe size is ${size} ${category}. What is your bra size?`;
    }
}

/**
 * Process bra size input.
 * @param {string} userMessage - The user's bra size input.
 * @returns {string} - The bot's response.
 */
function processBraSizeInput(userMessage) {
    const result = getBraSize(userMessage);
    if (result.error) {
        return result.message;
    } else {
       
        storeUserResponse('braSize', { vol: result.message.vol, band: result.message.band });

        registerFormFillUp()
        
        bulidModel(userResponses.bmi, userResponses.gender);
        let bodyModelerSection = document.querySelector('#bodyModelerSection');
        bodyModelerSection.style.display = "block";
        setTimeout(function() {
            scrollToNext(bodyModelerSection);
        }, 1500);
        return 'Use the next window to build a body model that best resembles your own body shape.';

    }
}


/**
 * Get the selected age from radio buttons.
 * @returns {string|boolean} - The selected age range or false if not selected.
 */
function getAge() {
    var radios = document.getElementsByName('age');
    for (var i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            return radios[i].value;
        }
    }
    return false;
}


/**
 * Process height input and return a status message.
 * @param {string} input - The user's height input.
 * @returns {string} - The status message.
 */

function getHeight(input) {
    var measurement;

    // Handle height input
    if (input.includes("cm") || input.includes("cent")) {
        var num = parseFloat(input);
        var inches = num / 2.54; // convert centimeters to inches
        measurement = inches.toFixed(2);
    } else if (input.includes("in")) {
        var splitNum = input.split("in");
        measurement = parseFloat(splitNum[0]);
    } else if (input.includes("'")) {
        var splitNum = input.split("'");
        var foot = parseFloat(splitNum[0]);
        var inch = parseInt(splitNum[1]);
        measurement = (foot * 12) + inch;
    } else if (input.includes(".")) {
        var height = parseFloat(input);
        measurement = height;
    } else {
        // Display an error message if the input format is not recognized

        return {
            error: true,
            message: `Please enter your height as inches or centimeters. For example, you can say 175cm or 70in.`
        }
    }
    // Validate the height
    if (measurement >= 58 && measurement <= 95) {


        return {
            error: false,
            message: measurement,
        };

    } else {
        return {
            error: true,
            massage: `My system only recognizes heights between 4'10" (58 inches) and 7'11" (95 inches). Please re-enter your height in inches.`
        }
    }
}


/**
 * Process weight input and return a BMI value or an error message.
 * @param {string} input - The user's weight input.
 * @param {string} sex - The user's gender.
 * @returns {number|string} - The BMI value or an error message.
 */
function getWeight(input) {
    var weight = input.match(/[\d\.]+|\D+/g);

    if (!weight || weight.length < 2) {
        return "Invalid input format. Please provide both a numerical value and a unit (e.g., 150 lbs or 70 kg).";
    }

    var wunit = parseInt(weight[0]);
    var metric = weight[1];

    if (metric !== null) {
        if (metric.match(/pound/g) || metric.match(/kilo/g) || metric.match(/lb/g) || metric.match(/kg/g)) {
            var wunit2 = (metric.match(/pound/g) || metric.match(/lb/g)) ? wunit : Math.round(wunit * 2.205);
            var errorMessage = validateWeight(wunit2);

            if (errorMessage) {

                return {
                    error: true,
                    message: errorMessage
                }
            } else {

                return { error: false, message: wunit2 }
            }


        } else {
            return "Invalid unit. Please use lbs or kgs (e.g., 150 lbs or 70 kg).";
        }
    } else {
        return "Invalid input format. Please provide both a numerical value and a unit (e.g., 150 lbs or 70 kg).";
    }
}

/**
 * Validate the weight and return an error message if it's outside the valid range.
 * @param {number} weight - The user's weight.
 * @returns {string|null} - The error message or null if weight is valid.
 */

function validateWeight(weight) {
    if (weight < 90 || weight > 350) {
        return "You have entered a weight that is dangerously unhealthy. Please enter a weight between 90 - 350lbs or 40 - 159kg to continue.";
    }
    return null;
}
/**
 * Calculate the BMI based on weight and height.
 * @param {number} weight - The user's weight.
 * @param {number} height - The user's height.
 * @returns {number} - The calculated BMI.
 */
function calculateBMI(weight, height) {

    // Add parseFloat to ensure numeric calculations
    var BMI = (parseFloat(weight) * 0.45) / (parseFloat(height) * 0.025 * parseFloat(height) * 0.025);


    return BMI.toFixed(1);
}
/**
 * Determine the weight class based on weight and sex.
 * @param {number} measurement - The user's weight measurement.
 * @param {string} sex - The user's gender.
 * @returns {string} - The weight class.
 */

function getWeightClass(BMI){
    if (BMI >= 16 && BMI < 22) {
       return "skinny";
    } else if (BMI >= 22 && BMI < 26) {
       return "average";
    } else if (BMI >= 26 && BMI < 38) {
       return "OW";
    } else if (BMI >= 38 && BMI < 42) {
       return "obese";
    } else {
       return "error";
    }
}


/**
 * Determine the height class based on height and sex.
 * @param {number} measurement - The user's height measurement.
 * @param {string} sex - The user's gender.
 * @returns {string} - The height class.
 */

function getHeightClass(measurement, sex) {
    var heightClass;
    if (measurement >= 58 && measurement <= 95) {
        if ((sex != "male") && (measurement >= 58 && measurement < 77)) {
            if (measurement >= 58 && measurement < 63) {
                return heightClass = "short";
            } else if (measurement >= 63 && measurement < 67) {
                return heightClass = "average";
            } else if (measurement >= 67 && measurement < 71) {
                return heightClass = "above";
            } else if (measurement >= 71 && measurement < 77) {
                return heightClass = "tall";
            } else {
                if (measurement < 58) {
                    //anorexic
                } else {
                    //morbidly obese
                }
            }
        } else if ((sex == "male") && (measurement >= 58 && measurement < 95)) {

            if (measurement >= 58 && measurement < 68) {
                return heightClass = "short";
            } else if (measurement >= 68 && measurement < 74) {
                return heightClass = "average";
            } else if (measurement >= 74 && measurement < 80) {
                return heightClass = "above";
            } else if (measurement >= 80 && measurement < 95) {
                return heightClass = "tall";
            } else {
                if (measurement < 58) {
                    //anorexic
                } else {
                    //morbidly obese
                }
            }
        }
    }
}

/**
 * Parses the user input to determine U.S. shoe size and category (kids, womens, mens).
 * @param {string} input - The user input containing the size and category (e.g., '8.5 womens').
 * @returns {Object} - An object containing the recognized shoe size and category, or an object with error details.
 */
function getShoeSize(input) {
    // Use a regular expression to extract the numeric value and category from the input
    const match = input.match(/([\d.]+)\s*([a-zA-Z]+)/);

    // Check if the input is in the correct format
    if (!match) {
        return {
            error: true,
            message: 'Invalid shoe size. Please enter a numeric value followed by the unit (e.g., 8.5 womens).',
        };
    }

    // Extract the sizing and category from the regex match
    const sizing = parseFloat(match[1]);
    const category = match[2].toLowerCase();

    // Helper function to check if a size is within a specified range
    const isValidSize = (size, min, max) => size >= min && size <= max;

    // Switch statement to handle different shoe categories
    switch (category) {
        case 'kid':
        case 'kids':
            return isValidSize(sizing, 3.5, 7) ? { size: sizing, category: 'kids' } : invalidShoeSizeMessage();
        case 'women':
        case 'woman':
        case 'womens':
        case 'womans':
            return isValidSize(sizing, 4, 15.5) ? { size: sizing, category: 'womens' } : invalidShoeSizeMessage();
        case 'men':
        case 'mens':
        case 'man':
        case 'mans':
            return isValidSize(sizing, 6, 24) ? { size: sizing, category: 'mens' } : invalidShoeSizeMessage();
        default:
            return {
                error: true,
                message: `I only recognize U.S. women's, men's, and kids shoe sizes. Click to <a href="/sizing-and-conversions-chart" style="color:yellow">convert your foot metric</a> here. Re-enter your input when ready.`,
            };
    }
}

/**
 * Returns an error message for invalid shoe sizes.
 * @returns {Object} - An object with the error flag and message.
 */
function invalidShoeSizeMessage() {
    return {
        error: true,
        message: 'Invalid shoe size. Please enter a valid size for the specified category.',
    };
}





/**
 * Processes user input to determine bra size information for different countries.
 * @param {string} userInput - The user input containing the volume and band size (e.g., '32C').
 * @returns {string} - A message indicating the recognized bra size and country.
 */
function getBraSize(userInput) {
    // Convert input to uppercase for case-insensitive matching
    var uppercasedInput = userInput.toUpperCase();

    // Extract volume and band size from the input
    var sizeComponents = uppercasedInput.match(/[\d\.]+|\D+/g);
    var volume = sizeComponents[0];
    var bandSize = sizeComponents[1];

    // Define valid volume ranges for different countries
    var validVolRanges = {
        'Japan': { start: 55, end: 110, step: 5 },
        'US': { start: 26, end: 48, step: 2 }
        // Add more countries if needed
    };

    // Check if the provided volume and band sizes are valid for the US
    var isValidVolUS = isValidVolume(parseInt(volume), validVolRanges['US']);
    var isValidBandUS = isValidBandSize(bandSize);

    if (!(isNaN(volume)) && isValidBandUS && isValidVolUS) {
        return setBraSizeValue(volume, bandSize, 'US');
    } else if (!(isNaN(bandSize)) && isValidBandUS && isValidVolUS) {
        if (!(isNaN(isValidVolUS))) {

            convertAndSetJaCupAndBandSizes();
            return setBraSizeValue(volume, bandSize, 'Japan');
        } else {
            return {
                error: true,
                message: `The measurement you entered is unrecognized. Click here to <a href="/bra-conversion-chart">convert to a US bra size</a>`
            }
        }
    } else {
        return {
            error: true,
            message: `Enter a valid US bra measurement. Click here for help determining your <a href="/bra-conversion-chart">bra size</a>`
        }
    }

    /**
     * Checks if a volume size is within a valid range for a given country.
     * @param {number} size - The volume size to check.
     * @param {Object} range - The valid range for the country.
     * @returns {boolean} - True if the size is valid, false otherwise.
     */
    function isValidVolume(size, range) {
        return size >= range.start && size <= range.end && (size - range.start) % range.step === 0;
    }

    /**
     * Checks if a band size is valid for the US.
     * @param {string} band - The band size to check.
     * @returns {boolean} - True if the band size is valid, false otherwise.
     */
    function isValidBandSize(band) {
        var validBandUS = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'AAA', 'AA', 'DD', 'DDD', 'HH', 'HHH', 'JJ', 'KK'];
        return validBandUS.includes(band);
    }

    /**
     * Sets the bra size value for the specified country in the DOM.
     * @param {string} vol - The volume size.
     * @param {string} band - The band size.
     * @param {string} country - The country code.
     * @returns {Object} - An object containing the bra size details.
     */
    function setBraSizeValue(vol, band, country) {
        // Modify vol and band if needed
        convertAndSetJaCupAndBandSizes();

        return {
            error: false,
            message: {
                vol,
                band,
                country
            }
        };
    }

    /**
     * Converts and sets the Japanese cup and band sizes in the DOM.
     */
    function convertAndSetJaCupAndBandSizes() {
        // Mapping for Japanese cup sizes
        var jaCupMapping = {
            'A': 'AA',
            'B': 'A',
            'C': 'B',
            'D': 'C',
            'E': 'D',
            'F': 'DD',
            'G': 'DDD',
            'H': 'F',
            'I': 'G',
            'J': 'H',
            'K': 'I'
        };

        if (jaCupMapping[volume]) {
            volume = jaCupMapping[volume];
        }

        // Mapping for Japanese band sizes
        var jaBandMapping = {
            '60': '28',
            '65': '30',
            '70': '32',
            '75': '34',
            '80': '36',
            '85': '38',
            '90': '40',
            '95': '42',
            '100': '44',
            '105': '46',
            '110': '48'
        };

        if (jaBandMapping[bandSize]) {
            bandSize = jaBandMapping[bandSize];
        }
    }



}

/**
 * Determines size based on the given type and value.
 * @param {string} type - The type of measurement (e.g., "head", "neckHeight", "neckWidth", "shoulderHeight", "shoulderWidth", "pregnancy", "arm", "armDistention", "breast", "torsoDistention", "crotchHeight", "legHeight", "leg", "hip").
 * @param {number} value - The value for the measurement, between 0.0 and 1.0.
 * @returns {string} - Returns the corresponding size description based on the input type and value.
 */
function getSize(type, value = 0.0) {
    switch (type) {
        case 'head':
            if (value <= 0.0) return "small";
            if (value <= 0.5) return "average";
            if (value <= 0.75) return "large";
            if (value <= 1.0) return "very large";
            break;
        case 'neckHeight':
            if (value === 0.0) return "Tall";
            if (value === 0.25 || value === 0.5) return "Average";
            if (value === 0.75) return "Short";
            if (value === 1.0) return "Hidden";
            break;
        case 'neckWidth': //change made
            if (value === 0.0) return "Skinny";
            if (value <= 0.5) return "Average";
            if (value <= 1.0) return "Girthy";
            break;
        case 'neckLayers': //change made
            if (value === 0.0) return "Null";
            if (value <= 1.0) return "Yes";
            break;
        case 'chinShape': //change made
            if (value === 0.0) return "Null";
            if (value <= 1.0) return "Yes";
            break;
        case 'Trapezoid': //change made
            if (value === 0.0) return "Average";
            if (value === 1.0) return "Trapezoidal";
            break;
        case 'shoulderHeight':
            if (value === 0.0) return "Strong";
            if (value === 0.5) return "Average";
            if (value === 1.0) return "Dropped";
            break;
        case 'shoulderWidth': //change made
            if (value <= 0.125) return "Narrow";
            if (value <= 0.625) return "Average";
            if (value <= 1.0) return "Broad";
            break;
        case 'pregnancy':
            if (value === 0.0) return "Trimester 1";
            if (value === 0.334) return "Trimester 2";
            if (value === 0.667) return "Trimester 3";
            if (value === 1.0) return "Trimester 4";
            break;
        case 'arm':
            if (value === 0.0) return "Small";
            if (value === 0.334 || value === 0.667) return "Average";
            if (value === 1.0) return "Large";
            break;
        case 'armDistention': //change made
            if (value === 0.0) return "Short";
            if (value === 0.5) return "Average";
            if (value === 1.0) return "Distended";
            break;
        case 'breast':
            if (value === 0.0) return "AA/A";
            if (value === 0.125) return "B";
            if (value === 0.25) return "C";
            if (value === 0.375) return "D/DD";
            if (value === 0.5) return "DDD/E";
            if (value === 0.625) return "F/G";
            if (value === 0.75) return "HH";
            if (value === 0.875) return "HHH";
            if (value === 1.0) return "J/K";
            break;
        case 'torsoDistention':
            if (value === 0.0) return "Short";
            if (value === 0.5) return "Average";
            if (value === 1.0) return "Tall";
            break;
        case 'crotchHeight': //change made
            if (value === 0.0) return "Average";
            if (value === 1.0) return "Tall";
            break;
        case 'legHeight':
            if (value === 0.0) return "Short";
            if (value === 0.5) return "Average";
            if (value === 1.0) return "Tall";
            break;
        case 'leg': //varies by shape
            if (value === 0.0) return "Leg 1";
            if (value === 0.334) return "Leg 2";
            if (value === 0.667) return "Leg 3";
            if (value === 1.0) return "Leg 4";
            break;
        case 'hip':
            if (value === 0.0) return "Small";
            if (value === 0.5) return "Average";
            if (value === 1.0) return "Wide";
            break;
        case 'bottomWidth':
            if (value === 0.0) return "Small";
            if (value === 1.0) return "Large";
            break;
        default:
            return "invalid type";
    }
    return "invalid value";
}

// Example usage:
// console.log(getSize('head', 0.6)); // Output: "large"
// console.log(getSize('neckHeight', 0.25)); // Output: "Average"


/**
 * Generates an alphanumeric code based on various body shape attributes.
 * The code is a combination of weight class, stomach shape, head and neck shape, shoulder width and height, 
 * breast size and arm size, height, and leg and hip size. 
 * Each attribute contributes a specific code segment, resulting in a unique alphanumeric string.
 *
 * @param {Object} shapeKeys - Contains body shape properties like stomach_shape, head_size, shoulder_width, etc.
 * @param {string} weightClass - Defines the weight class of the individual ('skinny', 'average', 'OW', 'obese').
 * 
 * @returns {string} - A concatenated alphanumeric code representing the combination of the body shape attributes.
 */
function generateAlphanumericCode(shapeKeys, weightClass) {

    // Initialize variables to store different segments of the alphanumeric code
    let alphaNum1 = '';
    let alphaNum2 = '';
    let alphaNum3 = '';
    let alphaNum4 = '';
    let alphaNum5 = '';
    let alphaNum6 = '';
    let alphaNum7 = '';

    // Generate code based on weight class
    // Assigns different codes for 'skinny', 'average', 'OW' (overweight), and 'obese' classes
    switch(weightClass) {
        case "skinny":
            alphaNum1 = "NY_";
            break;
        case "average":
            alphaNum1 = "VG_";
            break;
        case "OW":  // Overweight class
            alphaNum1 = "VE_";
            break;
        case "obese":
            alphaNum1 = "MO_";
    }

    // Generate code based on stomach shape
    // Assigns codes for stomach shapes: 'average', 'curvy', 'mt', 'spoon', 'rectangle', and 'pregnant'
    switch(shapeKeys.stomach_shape) {
        case "average":
            alphaNum2 = "001_";
            break;
        case "curvy":
            alphaNum2 = "002_";
            break;
        case "mt":
            alphaNum2 = "003_";
            break;
        case "spoon":
            alphaNum2 = "004_";
            break;
        case "rectangle":
            alphaNum2 = "005_";
            break;
        case "pregnant":
            alphaNum2 = "006_";
    }

    // Generate code for head and neck shape based on head size and head shape
    // 'small', 'average', and 'large' head sizes, with 'oval' or 'oblong' shapes, producing different codes
    if (getSize('head', shapeKeys.head_size) === "small") {
        switch(shapeKeys.head_shape) {
            case 'oval':
                alphaNum3 = "HNVS_";
                break;
            case 'oblong':
                alphaNum3 = "HNBS_";
                break;
            default:
                alphaNum3 = "HNRS_";
        }
    } else if (getSize('head', shapeKeys.head_size) === "average") {
        switch(shapeKeys.head_shape) {
            case 'oval':
                alphaNum3 = "HAVS_";
                break;
            case 'oblong':
                alphaNum3 = "HABS_";
                break;
            default:
                alphaNum3 = "HARS_";
        }
    } else {  // Large head size case
        switch(shapeKeys.head_shape) {
            case 'oval':
                alphaNum3 = "HLVS_";
                break;
            case 'oblong':
                alphaNum3 = "HLBS_";
                break;
            default:
                alphaNum3 = "HLRS_";
        }
    }

    // Generate code for shoulder width and height
    // Checks for 'narrow', 'average', and 'broad' shoulders combined with shoulder height ('strong', 'average', 'default')
    if (getSize('shoulderWidth', shapeKeys.shoulder_width) === "narrow") {
        switch(getSize('shoulderHeight', shapeKeys.shoulder_height)) {
            case 'strong':
                alphaNum4 = "NWSS_";
                break;
            case 'average':
                alphaNum4 = "NWAS_";
                break;
            default:
                alphaNum4 = "NWDS_";
        }
    } else if (getSize('shoulderWidth', shapeKeys.shoulder_width) === "average") {
        switch(getSize('shoulderHeight', shapeKeys.shoulder_height)) {
            case 'strong':
                alphaNum4 = "AWSS_";
                break;
            case 'average':
                alphaNum4 = "AWAS_";
                break;
            default:
                alphaNum4 = "AWDS_";
        }
    } else {  // Broad shoulders
        switch(getSize('shoulderHeight', shapeKeys.shoulder_height)) {
            case 'strong':
                alphaNum4 = "BWSS_";
                break;
            case 'average':
                alphaNum4 = "BWAS_";
                break;
            default:
                alphaNum4 = "BWDS_";
        }
    }

    // Generate code for breast size and arm size
    // Different codes for combinations of breast size ('AA/A', 'B', 'C', 'D/DD', 'DDD/E', 'F/G') and arm size ('small', 'average', 'big')
    if (["AA/A", "B"].includes(getSize('breast', shapeKeys.breast))) {
        if (shapeKeys.arm_size === "small") {
            alphaNum5 = "SBTA_";
        } else if (shapeKeys.arm_size === "average") {
            alphaNum5 = "SBAA_";
        } else {
            alphaNum5 = "SBBA_";
        }
    } else if (["C", "D/DD"].includes(getSize('breast', shapeKeys.breast))) {
        if (shapeKeys.arm_size === "small") {
            alphaNum5 = "ABTA_";
        } else if (shapeKeys.arm_size === "average") {
            alphaNum5 = "ABAA_";
        } else {
            alphaNum5 = "ABBA_";
        }
    } else if (["DDD/E", "F/G"].includes(getSize('breast', shapeKeys.breast))) {
        if (shapeKeys.arm_size === "small") {
            alphaNum5 = "LBTA_";
        } else if (shapeKeys.arm_size === "average") {
            alphaNum5 = "LBAA_";
        } else {
            alphaNum5 = "LBBA_";
        }
    } else {  // Enormous bust case
        if (shapeKeys.arm_size === "small") {
            alphaNum5 = "EBTA_";
        } else if (shapeKeys.arm_size === "average") {
            alphaNum5 = "EBAA_";
        } else {
            alphaNum5 = "EBBA_";
        }
    }

    // Generate code for height
    // Assigns '100_' for height > 67 (tall), '001_' for height < 60 (short), and '111_' for average height
    if (shapeKeys.height > 67) {
        alphaNum6 = "100_";
    } else if (shapeKeys.height < 60) {
        alphaNum6 = "001_";
    } else {
        alphaNum6 = "111_";
    }

    // Generate code for leg and hip size
    // Combinations of leg size ('small', 'average', 'big') and hip size ('small', 'average', 'big') determine the final code segment
    if (getSize('leg', shapeKeys.legs_size) === "small") {
        switch(shapeKeys.hips) {
            case 'small':
                alphaNum7 = "SLNH";
                break;
            case 'average':
                alphaNum7 = "SLSH";
                break;
            default:
                alphaNum7 = "SLWH";
        }
    } else if (shapeKeys.height > 60 && shapeKeys.height < 67) {
        switch(getSize('hip', shapeKeys.hips_size)) {
            case 'small':
                alphaNum7 = "ALNH";
                break;
            case 'average':
                alphaNum7 = "ALSH";
                break;
            default:
                alphaNum7 = "ALWH";
        }
    } else {  // Big leg size case
        switch(getSize('hip', shapeKeys.hips_size)) {
            case 'small':
                alphaNum7 = "BLNH";
                break;
            case 'average':
                alphaNum7 = "BLSH";
                break;
            default:
                alphaNum7 = "BLWH";
        }
    }

    // Concatenate all code segments and return the final alphanumeric code
    return alphaNum1 + alphaNum2 + alphaNum3 + alphaNum4 + alphaNum5 + alphaNum6 + alphaNum7;
}


/**
 * Global  Script
 * This script handles all common script.
 */

// DOM element
//all dom element will be there/**
/* scrollToNext will move to the next section.
 * @param {string} element - The user's name input.
 * @returns {string} - The bot's response.
 */
function scrollToNext(nextElement) {
    const isMobile = window.innerWidth <= 768;

    // If the device is mobile, do nothing and return early
    if (isMobile && nextElement) {
        setTimeout(() => {
            nextElement.scrollIntoView({ behavior: 'smooth', block: 'end' });
        }, 500)
        return;
    }


    let duration = 1000; // Adjust the duration as needed
    let start = window.pageYOffset;
    let end = document.body.offsetHeight - window.innerHeight;
    console.log('End', end, document.body.offsetHeight, window.innerHeight);
    // Adjusted for scrolling from top to bottom
    let startTime;

    function scrollAnimation(currentTime) {
        if (!startTime) startTime = currentTime;

        let progress = currentTime - startTime;
        let easeInOutQuad = progress => progress < 0.5 ? 2 * progress * progress : -1 + (4 - 2 * progress) * progress;

        window.scrollTo(0, start + (end - start) * easeInOutQuad(progress / duration));

        if (progress < duration) {
            window.requestAnimationFrame(scrollAnimation);
        }
    }

    window.requestAnimationFrame(scrollAnimation);
}



/**
 * Scroll to the bottom of an element with animation.
 * @param {HTMLElement} element - The element to scroll.
 * @param {number} duration - The duration of the scroll animation.
 */
function scrollToBottom(element, duration) {
    var start = element.scrollTop;
    var target = element.scrollHeight - element.clientHeight;
    var currentTime = 0;
    var increment = 20;

    function animateScroll() {
        currentTime += increment;
        var easing = Math.sin(currentTime / duration * (Math.PI / 2));
        element.scrollTop = start + easing * (target - start);

        if (currentTime < duration) {
            requestAnimationFrame(animateScroll);
        }
    }

    animateScroll();
}
/**
 * Initializes the slider functionality for desktop view.
 * The function checks if the current device is not mobile (window width > 768 pixels).
 * If it's not mobile, the function sets up a slider with specific behaviors.
 */
function initializeHorizontalScroll() {
    // Check if the current device is a mobile device (window width <= 768 pixels)
    const isMobile = window.innerWidth <= 768;

    // If the device is mobile, do nothing and return early
    if (isMobile) {
        return;
    }

    // Select all elements with the class "section" to be used as slider items
    const items = document.querySelectorAll(".section");

    // Select the main slider container
    const slider = document.querySelector(".main_container_wrapper");

    // Variables to store slider width, item width, and current scroll position
    let sliderWidth;
    let itemWidth;
    let currentPos = 0;

    /**
     * Initializes the slider by setting up initial properties,
     * such as the slider width and the body height.
     */
    function init() {
        sliderWidth = slider.getBoundingClientRect().width;
        itemWidth = sliderWidth / items.length;
        document.body.style.height = `${
    sliderWidth - (window.innerWidth - window.innerHeight)
}px`;
    }

    /**
     * Sets the width of the slider based on the combined width of its items.
     */
    function setSliderWidth() {
        let totalWidth = 0;
        items.forEach((item) => {
            totalWidth += item.offsetWidth;
        });

        slider.style.width = `${totalWidth}px`;
    }

    /**
     * Animates the slider by updating its position based on the current scroll position.
     * This function is called recursively using requestAnimationFrame for smooth animation.
     */
    function animate() {
        init();
        setSliderWidth();
        currentPos = window.scrollY;
        slider.style.transform = `translateX(${-currentPos}px)`;
        requestAnimationFrame(animate);
    }

    // Start the animation loop to continuously update the slider position
    animate();
}



// Wait for the HTML content to be fully loaded before executing the script
document.addEventListener("DOMContentLoaded", function() {
    // Select the loader container element using its class
    const loaderContainer = document.querySelector('.loader-container');

    // Hide the loader container once the content is fully loaded
    if (loaderContainer !== null) {
        loaderContainer.style.display = 'none';
    }

});

/**
 * Home page  Script
 * This script handles all home script.
 */
// DOM element

function validateUserType() {
    const userType = document.getElementById('selectedUserType').value;
    const agreeCheckbox = document.getElementById('agreeBtn');

    if (userType === '') {
        alert(`Please select a user type`);
        return false;
    } else if (!agreeCheckbox.checked) {
        alert(`Please agree that you are above 18 years old`);
        return false;
    } else {
        return userType;
    }
}

function hideSections(sections) {
    sections.forEach(section => {
        if (section.style.display !== 'none') {
            section.style.display = 'none';
        }
    });
}

function userRegisterChecker() {
    const userType = validateUserType();
    const sopiaChatSection = document.querySelector('#sopiaChatSection');
    const advertiserSection = document.querySelector('#advertiserSection');
    const bodyModelerSection = document.querySelector('#bodyModelerSection');
    const registationSection = document.querySelector('#registationSection');
    const retailerSection = document.querySelector('#retailerSection');

    const commonSections = [sopiaChatSection, advertiserSection, bodyModelerSection, registationSection, retailerSection];

    hideSections(commonSections);
    storeUserResponse('user_type', userType);
    // console.log(userType);
    // console.log(userResponses);
 
    switch (userType) {
        case 'retailer':
            retailerSection.style.display = 'flex';
            setTimeout(() => scrollToNext(retailerSection), 500);
            break;
        case 'influencer':
        case 'shopper':

            sopiaChatSection.style.display = 'flex';
            setTimeout(() => scrollToNext(sopiaChatSection), 500);
            break;
        case 'advertiser':
            document.querySelector("#advertiserSection input[name='user_type']").value = userType;
            advertiserSection.style.display = 'flex';
            setTimeout(() => scrollToNext(advertiserSection), 500);
            break;
        default:
            // Code to execute if none of the cases match
            break;
    }
}
/**
 * Populates the registration form fields with data from the userResponses object.
 * @function
 */
/**
 * Populates the registration form fields with data from the userResponses object.
 * @function
 */
function registerFormFillUp() {
    // Mapping between form input names and corresponding properties in userResponses
    const inputMappings = {
        'name': 'name',
        'bust': ['braSize.vol', 'braSize.band'],
        'shoe_size': ['shoeSize.size', 'shoeSize.category'],
        'weight': 'weight',
        'height': 'height',
        'bmi': 'bmi',
        'age_range': 'age_range',
        'gender': 'gender'
    };


    for (const [inputName, userResponseProp] of Object.entries(inputMappings)) {

        // Constructing the query selector for the input element within the registration form
        let prefixEl = `#userRegisterForm`;
        let inputElement = document.querySelector(`${prefixEl} input[name='${inputName}']`);

        // Check if the input element exists
        if (inputElement !== null) {
            // Special handling for radio buttons
            if (inputElement.type === 'radio') {
                // Find the radio button with the matching value and set it as checked
                let radioWithValue = document.querySelector(`input[name='${inputName}'][value='${getNestedPropertyValue(userResponses, userResponseProp)}']`);
                if (radioWithValue !== null) {
                    radioWithValue.checked = true;
                }
            } else {
                // Set the value for other input types
                let value = typeof userResponseProp === 'string' ?
                    getNestedPropertyValue(userResponses, userResponseProp) :
                    userResponseProp.map(prop => getNestedPropertyValue(userResponses, prop)).join(', ');

                inputElement.value = value;
            }
        }
    }
}


/**
 * Helper function to retrieve nested property value from an object.
 * @function
 * @param {Object} obj - The object from which to retrieve the nested property value.
 * @param {string} propPath - The path to the nested property (e.g., 'braSize.vol').
 * @returns {*} - The value of the nested property.
 */
function getNestedPropertyValue(obj, propPath) {
    return propPath.split('.').reduce((o, p) => o[p], obj);
}

function goToNextSection(element) {
    const sopiaChatSection = document.querySelector('#sopiaChatSection');
    const advertiserSection = document.querySelector('#advertiserSection');
    const bodyModelerSection = document.querySelector('#bodyModelerSection');
    const registationSection = document.querySelector('#registationSection');
    const retailerSection = document.querySelector('#retailerSection');
    const FashionProfessionalSection = document.querySelector('#FashionProfessionalSection');

    const commonSections = [sopiaChatSection, advertiserSection, bodyModelerSection, registationSection, retailerSection, FashionProfessionalSection];

    hideSections(commonSections);
    let section = document.querySelector(element);
    section.style.display = "block";
    setTimeout(function() {
        scrollToNext(section);
    }, 1500);
}

function goToRegisterSection(element) {
   
    let section = document.querySelector(element);
    section.style.display = "block";
    setTimeout(function() {
        scrollToNext(section);
    }, 1500);
}

const shapeKeys = {}

//         if (BABYLON.Engine.isSupported()) {
//     const canvas = document.getElementById('renderCanvas');
//     const engine = new BABYLON.Engine(canvas, true);
//     // Rest of your code...
// } else {
//     alert("WebGL is not supported on your device or browser.");
// }
  // Initialize Babylon.js 
const canvas = document.getElementById('renderCanvas');
const engine = new BABYLON.Engine(canvas, true);
const scene = new BABYLON.Scene(engine);
scene.clearColor = new BABYLON.Color4(153 / 255, 0, 0, 1); 
if (BABYLON.Engine.isSupported()) {
    console.log("WebGL is supported!");
} else {
    alert("WebGL is not supported on your device or browser.");
}

// Custom orthographic camera class without zoom and rotation
class NoZoomOrthoCamera extends BABYLON.FreeCamera {
    constructor(name, position, scene) {
        super(name, position, scene);
        this.mode = BABYLON.Camera.ORTHOGRAPHIC_CAMERA;

        // Disable zoom and rotation
        this.inputs.clear(); // Clear all inputs (removes mouse and keyboard inputs)
    }
}

// Set up the orthographic camera
const camera = new NoZoomOrthoCamera("noZoomOrthoCamera", new BABYLON.Vector3(0, 0, 1000), scene);

// Configure orthographic size
const aspectRatio = engine.getRenderWidth() / engine.getRenderHeight();
const orthoSize = 35; // Adjust for zoom level (like your original radius setting)
camera.orthoLeft = -orthoSize * aspectRatio;
camera.orthoRight = orthoSize * aspectRatio;
camera.orthoTop = orthoSize;
camera.orthoBottom = -orthoSize;

// Attach the camera to the canvas (no need for controls as inputs are removed)
camera.setTarget(BABYLON.Vector3.Zero());

// Create lighting
const hemisphericLight = new BABYLON.HemisphericLight("light", new BABYLON.Vector3(1, 1, 1), scene);
hemisphericLight.intensity = 0.8;

// Load the .glb file and process the model
function loadGLBFile(url) {
    BABYLON.SceneLoader.Append("", url, scene, function (scene) {
        console.log("Model file loaded successfully");

        scene.meshes.forEach(mesh => {
            const model = scene.getMeshByName(mesh.name);
            if (model) {
                model.position.y = -25;

                const bodyRearBtn = document.getElementById("bodyRearBtn");
                if (bodyRearBtn) {
                    bodyRearBtn.addEventListener('click', () => {
                        if (model.rotation.y === 0) {
                            model.rotation.y = BABYLON.Tools.ToRadians(-90);
                        } else if (model.rotation.y === BABYLON.Tools.ToRadians(-90)) {
                            model.rotation.y = BABYLON.Tools.ToRadians(180);
                        } else {
                            model.rotation.y = BABYLON.Tools.ToRadians(0);
                        }
                    });
                } else {
                    console.error('Element with ID "bodyRearBtn" not found.');
                }

                // Set the pivot point and position
                model.setPivotPoint(new BABYLON.Vector3(0, 0, 0));
            }

            // Log material info for debugging and set alpha to 1.0
            const material = mesh.material;
            if (material) {
                console.log(`Material for ${mesh.name}:`, material);
                if (material.diffuseTexture) {
                    console.log(`Diffuse Texture:`, material.diffuseTexture);
                }else{
                    console.log(`Diffuse Texture is Not found`);
                }

                // Set alpha to 1.0 (fully opaque)
                material.alpha = 1.0;
            } else {
                console.log(`${mesh.name} has no material`);
            }

            // Check for morph targets
            if (mesh.morphTargetManager) {
                const manager = mesh.morphTargetManager;
                console.log(`Number of Morph Targets: ${manager.numTargets}`);
                for (let i = 0; i < manager.numTargets; i++) {
                    const target = manager.getTarget(i);
                    storeShapeKeys(target.name, target.influence)
                 console.log(`Morph Target: ${target.name}, Influence: ${target.influence}`);
                }
            }
        });
    }, null, function (scene, message, exception) {
        console.error("Error loading model file:", message, exception);
    });
}


// Update morph target influence dynamically
function updateMorphTarget(meshName, targetName, newInfluence) {
    const mesh = scene.getMeshByName(meshName);
    if (mesh && mesh.morphTargetManager) {
        const target = mesh.morphTargetManager.getTargetByName(targetName);
        if (target) {
            target.influence = newInfluence;
           
            storeShapeKeys(target.name, target.influence)
           console.log(`Updated Morph Target: ${target.name}, New Influence: ${target.influence}`);
        }
    }
}

// Show the Babylon.js inspector for debugging
// scene.debugLayer.show();

// Render loop
engine.runRenderLoop(() => scene.render());

// Handle window resize
window.addEventListener('resize', () => engine.resize());



// Function to store shape key and its value
function storeShapeKeys(key, value) {
    shapeKeys[key] = value;
    console.log(`Stored ${key}: ${value}`);
}

// Get references to all the sliders
const sliders = {
    headShape: document.getElementById('slider-head-shape'),
    headSize: document.getElementById('slider-head-size'),
    neckHeight: document.getElementById('slider-neck-height'),
    neckWidth: document.getElementById('slider-neck-width'),
    neckShape: document.getElementById('slider-neck-shape'),
    chinShape: document.getElementById('slider-chin-shape'),
    shoulderHeight: document.getElementById('slider-shoulder-height'),
    shoulderWidth: document.getElementById('slider-shoulder-width'),
    armSize: document.getElementById('slider-arm-size'),
    armLength: document.getElementById('slider-arm-length'),
    breastSize: document.getElementById('slider-breast-size'),
    torsoHeight: document.getElementById('slider-torso-height'),
    crotchHeight: document.getElementById('slider-crotch-height'),
    legSize: document.getElementById('slider-leg-size'),
    hipSize: document.getElementById('slider-hip-size'),
    stomachShape: document.getElementById('slider-stomach-shape'),
    stomachWidth: document.getElementById('slider-stomach-width'),
    trimester: document.getElementById('slider-pregnant-size'),
    bottomShape: document.getElementById('slider-bottom-shape'),
    bottomWidth: document.getElementById('slider-bottom-width'),
    neckLayers: document.getElementById('slider-neck-rolls')
};

// Add event listeners to each slider to store their values dynamically

function handleHeadShapeChange(headShapeValue) {
  
    // Update head shape morph targets based on slider value
    const shapes = ['oblong', 'round'];
    shapes.forEach((shape, index) => {
        const value = (headShapeValue == index + 1) ? 1 : 0;
        
        updateMorphTarget('Shape_average_petite:High-poly_primitive0', `shape_head_${shape}`, Number(value));
        updateMorphTarget('Shape_average_petite:High-poly_primitive1', `shape_head_${shape}`, Number(value));
        updateMorphTarget('Shape_average_petite:High-poly_primitive2', `shape_head_${shape}`, Number(value));
       
      
    });


}




// Event listener for head shape slider
sliders.headShape.addEventListener('change', function () {
    handleHeadShapeChange(sliders.headShape.value);
});


// Shape key mappings
const stomachShapeKeys = {
    '0': 'stomach_width_average',     // Average, Curvy, Pouch, Muffintop
    '1': 'stomach_width_average',
    '2': 'stomach_width_spoon',
    '3': 'stomach_width_spoon',
    '4': 'stomach_width_rect', // Rectangle
    '5': 'stomach_width_pregnant'      // Spoon
};

const allStomachShapeKeys = ['stomach_width_average', 'stomach_width_spoon', 'stomach_width_rect','stomach_width_pregnant' ];
// Initially disable the trimester slider
sliders.trimester.disabled = true;

// Function to change stomach shape based on slider value
function handleStomachShapeChange(stomachShapeValue) {
    const shapes = ['curvy', 'MT', 'spoon', 'rectangle', 'pregnant'];
    shapes.forEach((shape, index) => {
        const value = (stomachShapeValue == index + 1) ? 1 : 0;

        updateMorphTarget('Shape_average_petite:High-poly_primitive0', `shape_stomach_${shape}`, Number(value));
        updateMorphTarget('Shape_average_petite:High-poly_primitive1', `shape_stomach_${shape}`, Number(value));
        updateMorphTarget('Shape_average_petite:High-poly_primitive2', `shape_stomach_${shape}`, Number(value));

      
    });

    const activeShapeKey = stomachShapeKeys[stomachShapeValue] || 'stomach_width_pouch';

    // Enable/disable trimester slider based on stomach shape value
    if (stomachShapeValue == 5) { // Pregnant shape
        sliders.trimester.disabled = false; // Enable trimester slider
    } else {
        sliders.trimester.disabled = true;  // Disable trimester slider
    }

    allStomachShapeKeys.forEach(key => {
        const value = (key === activeShapeKey) ? 1 : 0;
        if (value) {
            updateMorphTarget('Shape_average_petite:High-poly_primitive0', key, Number(sliders.stomachWidth.value));
            updateMorphTarget('Shape_average_petite:High-poly_primitive1', key, Number(sliders.stomachWidth.value));
            updateMorphTarget('Shape_average_petite:High-poly_primitive2', key, Number(sliders.stomachWidth.value));
        }
    });
}

// Event listener for stomach shape slider
sliders.stomachShape.addEventListener('change', function () {
    handleStomachShapeChange(sliders.stomachShape.value);
});



// Shoulder width and stomach size


// Function to update shoulder width morph target for all primitives
function updateShoulderWidth(value) {
    ['High-poly_primitive0', 'High-poly_primitive1', 'High-poly_primitive2'].forEach(primitive => {
        updateMorphTarget(`Shape_average_petite:${primitive}`, 'shoulder_width', value);
    });
}

// Function to determine the stomach shape key based on the stomach shape slider value
function getStomachShapeKey(stomachShapeValue) {
    switch (stomachShapeValue) {
        case '2':
        case '3':
            return 'stomach_width_spoon';
        case '4':
            return 'stomach_width_rect';
        case '5':
            return 'stomach_width_pregnant';
        default:
            return 'stomach_width_average';
    }
}

// Function to update stomach shape morph targets based on the selected shape key
function updateStomachShapeMorphTargets(shapeKey, value) {
    // Define all stomach shape keys with default value 0
    const shapeKeys = {
        'stomach_width_pregnant': 0,
        'stomach_width_rect': 0,
        'stomach_width_spoon': 0,
        'stomach_width_average': 0
    };

    // Set active shape key with the current shoulder width value
    shapeKeys[shapeKey] = value;

    // Update each stomach morph target for all primitives
    Object.keys(shapeKeys).forEach(key => {
        const keyValue = shapeKeys[key];
 
     
        ['High-poly_primitive0', 'High-poly_primitive1', 'High-poly_primitive2'].forEach(primitive => {
            updateMorphTarget(`Shape_average_petite:${primitive}`, key, keyValue);
        });
    });
}

// Main event listener function for the shoulder width slider
function handleShoulderWidthChange() {
    const shoulderWidthValue = Number(sliders.shoulderWidth.value);
    
    // Update shoulder width for all primitives
    updateShoulderWidth(shoulderWidthValue);

    // Get the current stomach shape key
    const shapeKey = getStomachShapeKey(sliders.stomachShape.value);

    // Update stomach shape morph targets based on the selected shape key
    updateStomachShapeMorphTargets(shapeKey, shoulderWidthValue);
}

// Attach the event listener to the shoulder width slider
sliders.shoulderWidth.addEventListener('change', handleShoulderWidthChange);


// Function to update a specific morph target for all primitives
function updateMorphTargetForAllPrimitives(shapePrefix, morphTarget, value) {
    ['High-poly_primitive0', 'High-poly_primitive1', 'High-poly_primitive2'].forEach(primitive => {
        updateMorphTarget(`${shapePrefix}:${primitive}`, morphTarget, value);
    });
}

// Function to reset all stomach width morph targets to 0
function resetStomachMorphTargets(shapePrefix) {
    ['stomach_width_pregnant', 'stomach_width_rect', 'stomach_width_spoon', 'stomach_width_average'].forEach(morphTarget => {
        updateMorphTargetForAllPrimitives(shapePrefix, morphTarget, 0);
    });
}

// Function to update stomach morph targets based on the selected shape key and stomach width value
function updateStomachShape(shapeKey, stomachWidthValue) {
    const shapePrefix = 'Shape_average_petite';
    
    // Reset all stomach morph targets to 0
    resetStomachMorphTargets(shapePrefix);
    
    // Update the selected morph target with the current stomach width value
    updateMorphTargetForAllPrimitives(shapePrefix, shapeKey, stomachWidthValue);
}

// Function to get the appropriate stomach shape key based on the stomach shape slider value
function getStomachShapeKey(value) {
    switch (value) {
        case '2':
        case '3':
            return 'stomach_width_spoon';
        case '4':
            return 'stomach_width_rect';
        case '5':
            return 'stomach_width_pregnant';
        default:
            return 'stomach_width_average';
    }
}

// Main function to handle changes in the stomach width slider
function handleStomachWidthChange() {
    const stomachWidthValue = Number(sliders.stomachWidth.value);
    storeShapeKeys('stomach_width',stomachWidthValue);
    // Update shoulder width for all primitives
    updateMorphTargetForAllPrimitives('Shape_average_petite', 'shoulder_width', stomachWidthValue);

    // Determine the appropriate shape key for the stomach
    const shapeKey = getStomachShapeKey(sliders.stomachShape.value);
    
    // Update the morph targets based on the selected stomach shape
    updateStomachShape(shapeKey, stomachWidthValue);
}

// Attach the event listener to the stomach width slider
sliders.stomachWidth.addEventListener('change', handleStomachWidthChange);



// Function to update morph targets for all primitives of a given bottom shape
function updateBottomShapeMorphTargets(shapePrefix, shape, value) {
    ['High-poly_primitive0', 'High-poly_primitive1', 'High-poly_primitive2'].forEach(primitive => {
        updateMorphTarget(`${shapePrefix}:${primitive}`, `bottom_shape_${shape}`, value);
    });
}

// Function to reset all bottom shape morph targets
function resetBottomShapeMorphTargets(shapePrefix, shapes) {
    shapes.forEach(shape => {
        updateBottomShapeMorphTargets(shapePrefix, shape, 0);
    });
}

// Function to handle bottom shape change
function handleBottomShapeChange() {
    const shapePrefix = 'Shape_average_petite';
    const shapes = ['round', 'square', 'inverted', 'flat', 'heart'];

    // Reset all bottom shape morph targets
    resetBottomShapeMorphTargets(shapePrefix, shapes);

    // Get the selected shape and update only the corresponding morph target
    const selectedShapeIndex = Number(sliders.bottomShape.value) - 1;
    if (selectedShapeIndex >= 0 && selectedShapeIndex < shapes.length) {
        const selectedShape = shapes[selectedShapeIndex];
      
        updateBottomShapeMorphTargets(shapePrefix, selectedShape, 1);
    }
}

// Attach the event listener for the bottom shape slider
sliders.bottomShape.addEventListener('change', handleBottomShapeChange);

// Function to apply the neck shape morph target value to all primitives
function setNeckShapeMorphTargets(value) {
    const primitives = ['High-poly_primitive0', 'High-poly_primitive1', 'High-poly_primitive2'];
    primitives.forEach(primitive => {
        updateMorphTarget(`Shape_average_petite:${primitive}`, 'neck_shape', value);
    });
}

// Function to determine the neck shape value based on the slider input
function getNeckShapeValue() {
    return sliders.neckShape.value == 0 ? 0 : Number(sliders.stomachWidth.value);
}

// Event listener for the neck shape slider
sliders.neckShape.addEventListener('change', function () {
    const neckShapeValue = getNeckShapeValue();
    setNeckShapeMorphTargets(neckShapeValue);
   
});

// Helper function to add change event listener for sliders
function addChangeListener(slider, morphName) {
    slider.addEventListener('change', function () {
        updateMorphTarget('Shape_average_petite:High-poly_primitive0', morphName, Number(slider.value));
        updateMorphTarget('Shape_average_petite:High-poly_primitive1', morphName, Number(slider.value));
        updateMorphTarget('Shape_average_petite:High-poly_primitive2', morphName, Number(slider.value));
    });
}

addChangeListener(sliders.headSize, 'head_size');
addChangeListener(sliders.neckHeight, 'neck_height');
addChangeListener(sliders.neckWidth, 'neck_width');
addChangeListener(sliders.shoulderHeight, 'shoulder_height');
addChangeListener(sliders.armSize, 'arm_size');
addChangeListener(sliders.armLength, 'arms_distended');
addChangeListener(sliders.breastSize, 'breasts');
addChangeListener(sliders.torsoHeight, 'torso_distended');
addChangeListener(sliders.crotchHeight, 'crotch_height');
addChangeListener(sliders.legSize, 'leg_size');
addChangeListener(sliders.hipSize, 'hips_size');
addChangeListener(sliders.bottomWidth, 'bottom_width');
addChangeListener(sliders.trimester, 'trimester');
addChangeListener(sliders.chinShape, 'chin_shape');
addChangeListener(sliders.neckLayers, 'neck_layers');





     function getMaxNeckHeight(neckWidth) {
     
     
            let maxNeckHeight;

  // Map neck width to maximum neck height
  if (neckWidth === 0.75) {
    maxNeckHeight = 0.5;
  } else if (neckWidth === 1.0) {
    maxNeckHeight = 0.75;
  } else {
    maxNeckHeight = "Invalid neck width";  // Default case for unsupported neck widths
  }

  console.log(`For Neck Width: ${neckWidth}, Max Neck Height is: ${maxNeckHeight}`);
  return maxNeckHeight;
}


 function femaleSkinny() { 

    sliders.headSize.addEventListener('change', function () {
       
        if (sliders.headSize.value >= 0.5) {
            updateMorphTarget('Shape_average_petite:High-poly_primitive0', 'reconsile_lg_head', 1);
            updateMorphTarget('Shape_average_petite:High-poly_primitive1', 'reconsile_lg_head', 1);
            updateMorphTarget('Shape_average_petite:High-poly_primitive2', 'reconsile_lg_head', 1);
        } else {
            updateMorphTarget('Shape_average_petite:High-poly_primitive0', 'reconsile_lg_head', 0);
            updateMorphTarget('Shape_average_petite:High-poly_primitive1', 'reconsile_lg_head', 0);
            updateMorphTarget('Shape_average_petite:High-poly_primitive2', 'reconsile_lg_head', 0);
        }
    });

    sliders.neckHeight.addEventListener('change', function () { 
        const neckHeight = sliders.neckHeight.value;

let neckLayers;

// Map neck height to neck layers
if (neckHeight <= 0.2) {
  neckLayers = 1.0;
} else if (neckHeight === 0.4) {
  neckLayers = 0.8;
} else if (neckHeight === 0.6) {
  neckLayers = 0.6;
} else if (neckHeight === 0.8) {
  neckLayers = 0.4;
} else {
  neckLayers = 0.0;  // Default case if none of the conditions are met
}

updateMorphTarget('Shape_average_petite:High-poly_primitive0', 'neck_layers', neckLayers);
updateMorphTarget('Shape_average_petite:High-poly_primitive1', 'neck_layers', neckLayers);
updateMorphTarget('Shape_average_petite:High-poly_primitive2', 'neck_layers', neckLayers);
    });



    // Attach the trapezoid update function to the sliders
    sliders.shoulderWidth.addEventListener('change', updateTrapezoidShape);
    sliders.shoulderHeight.addEventListener('change', updateTrapezoidShape);
    sliders.neckWidth.addEventListener('change', updateTrapezoidShape);

    // Function to update the trapezoid value based on inputs
    function updateTrapezoidShape() {
        let shoulderWidth = sliders.shoulderWidth.value;
        let shoulderHeight = sliders.shoulderHeight.value;
        let neckWidth = sliders.neckWidth.value;
        let trapezoid = 0; // Default trapezoid value

        console.log('Shoulder Width:', shoulderWidth, 'Shoulder Height:', shoulderHeight, 'Neck Width:', neckWidth);

        // Set trapezoid based on conditions from your list
        if (shoulderHeight == 0.0) {
            if (neckWidth <= 0.5) {
                if (shoulderWidth <= 0.375) {
                    trapezoid = 0.75;
                } else if (shoulderWidth <= 0.75) {
                    trapezoid = 0.875;
                } else {
                    trapezoid = 1.0;
                }
            } else if (neckWidth <= 0.75) {
                if (shoulderWidth <= 0.25) {
                    trapezoid = 0.5;
                } else if (shoulderWidth <= 0.625) {
                    trapezoid = 0.625;
                } else if (shoulderWidth <= 0.875) {
                    trapezoid = 0.75;
                } else if (shoulderWidth == 1.0) {
                    trapezoid = 1.0;
                }
            } else if (neckWidth <= 1.0) {
                if (shoulderWidth <= 0.125) {
                    trapezoid = 0.375;
                } else if (shoulderWidth <= 0.375) {
                    trapezoid = 0.5;
                } else if (shoulderWidth <= 0.75) {
                    trapezoid = 0.625;
                } else if (shoulderWidth <= 1.0) {
                    trapezoid = 0.75;
                }
            }
        } else if (shoulderHeight >= 0.49 && shoulderHeight <= 0.51) {
            if (neckWidth <= 0.25) {
                if (shoulderWidth <= 0.375) {
                    trapezoid = 0.5;
                } else if (shoulderWidth <= 0.75) {
                    trapezoid = 0.625;
                } else {
                    trapezoid = 0.75;
                }
            } else if (neckWidth <= 0.5) {
                if (shoulderWidth <= 0.25) {
                    trapezoid = 0.25;
                } else if (shoulderWidth <= 0.625) {
                    trapezoid = 0.5;
                } else if (shoulderWidth <= 1.0) {
                    trapezoid = 0.625;
                }
            } else if (neckWidth <= 0.75) {
                if (shoulderWidth <= 0.25) {
                    trapezoid = 0.375;
                } else if (shoulderWidth <= 0.625) {
                    trapezoid = 0.5;
                } else if (shoulderWidth <= 1.0) {
                    trapezoid = 0.625;
                }
            } else if (neckWidth == 1.0) {
                if (shoulderWidth <= 0.25) {
                    trapezoid = 0.25;
                } else if (shoulderWidth <= 0.625) {
                    trapezoid = 0.375;
                } else if (shoulderWidth <= 1.0) {
                    trapezoid = 0.5;
                }
            }
        } else if (shoulderHeight >= 0.99 && shoulderHeight <= 1.01) {
            if (neckWidth <= 0.5) {
                if (shoulderWidth <= 0.375) {
                    trapezoid = 0.375;
                } else if (shoulderWidth > 0.375) {
                    trapezoid = 0.5;
                }
            } else if (neckWidth == 0.75 || neckWidth == 1.0) {
                trapezoid = 0.0;
            }
        }

        console.log('Trapezoid:', trapezoid);

        // Update the morph target with the calculated trapezoid value
        updateMorphTarget('Shape_average_petite:High-poly_primitive0', 'trapezoid', trapezoid);
        updateMorphTarget('Shape_average_petite:High-poly_primitive1', 'trapezoid', trapezoid);
        updateMorphTarget('Shape_average_petite:High-poly_primitive2', 'trapezoid', trapezoid);
    }
}



function femaleAverage() {
   
   
   



    sliders.headSize.addEventListener('change', function () {
        let headSize = sliders.headSize.value;
        console.log(headSize)
        if (headSize >= 0.75) {
            updateMorphTarget('Shape_average_petite:High-poly_primitive0', 'reconsile_lg_head', 1);
            updateMorphTarget('Shape_average_petite:High-poly_primitive1', 'reconsile_lg_head', 1);
            updateMorphTarget('Shape_average_petite:High-poly_primitive2', 'reconsile_lg_head', 1);
        } else {
            updateMorphTarget('Shape_average_petite:High-poly_primitive0', 'reconsile_lg_head', 0);
            updateMorphTarget('Shape_average_petite:High-poly_primitive1', 'reconsile_lg_head', 0);
            updateMorphTarget('Shape_average_petite:High-poly_primitive2', 'reconsile_lg_head', 0);
        }
    });

   
    // Neck layers based on neck height

    sliders.neckHeight.addEventListener('change', function () { 
        let neckHeight = sliders.neckHeight.value;
        console.log('Neck Height',neckHeight);
     if (neckHeight == 0.0) {
      
        updateMorphTarget('Shape_average_petite:High-poly_primitive0', 'neck_layers', 1);
        updateMorphTarget('Shape_average_petite:High-poly_primitive1', 'neck_layers', 1);
        updateMorphTarget('Shape_average_petite:High-poly_primitive2', 'neck_layers', 1);
    } else if (neckHeight == 0.2) {
        updateMorphTarget('Shape_average_petite:High-poly_primitive0', 'neck_layers', 0.8);
        updateMorphTarget('Shape_average_petite:High-poly_primitive1', 'neck_layers', 0.8);
        updateMorphTarget('Shape_average_petite:High-poly_primitive2', 'neck_layers', 0.8);
       
    } else if (neckHeight == 0.4) {
        updateMorphTarget('Shape_average_petite:High-poly_primitive0', 'neck_layers', 0.6);
        updateMorphTarget('Shape_average_petite:High-poly_primitive1', 'neck_layers', 0.6);
        updateMorphTarget('Shape_average_petite:High-poly_primitive2', 'neck_layers', 0.6);
       
    } else if (neckHeight == 0.6) {
        updateMorphTarget('Shape_average_petite:High-poly_primitive0', 'neck_layers', 0.4);
        updateMorphTarget('Shape_average_petite:High-poly_primitive1', 'neck_layers', 0.4);
        updateMorphTarget('Shape_average_petite:High-poly_primitive2', 'neck_layers', 0.4);
        
    } else if (neckHeight >= 0.8) {
        updateMorphTarget('Shape_average_petite:High-poly_primitive0', 'neck_layers', 0.2);
        updateMorphTarget('Shape_average_petite:High-poly_primitive1', 'neck_layers', 0.2);
        updateMorphTarget('Shape_average_petite:High-poly_primitive2', 'neck_layers', 0.2);
       
    }else{
        updateMorphTarget('Shape_average_petite:High-poly_primitive0', 'neck_layers', 0);
        updateMorphTarget('Shape_average_petite:High-poly_primitive1', 'neck_layers', 0);
        updateMorphTarget('Shape_average_petite:High-poly_primitive2', 'neck_layers', 0);
    }

   
    });
       // Attach the trapezoid update function to the sliders
       sliders.shoulderWidth.addEventListener('change', updateTrapezoidShape);
    sliders.shoulderHeight.addEventListener('change', updateTrapezoidShape);
    sliders.neckWidth.addEventListener('change', updateTrapezoidShape);
 function updateTrapezoidShape(){
    let neckWidth = sliders.neckWidth.value;
    let shoulderWidth = sliders.shoulderWidth.value;
    let shoulderHeight = sliders.shoulderHeight.value;
    let trapezoid = 0;
       // Trapezoid conditions based on shoulder and neck values
  if (shoulderWidth <= 0.25 && shoulderHeight === 0.0 && neckWidth <= 0.5) {
        trapezoid = 0.5;
    } else if (shoulderWidth <= 0.625 && shoulderHeight === 0.0 && neckWidth <= 0.5) {
        trapezoid = 0.75;
    } else if (shoulderWidth > 0.625 && shoulderHeight === 0.0 && neckWidth <= 0.5) {
        trapezoid = 1.0;
    } else if (shoulderWidth <= 0.25 && shoulderHeight === 0.0 && neckWidth == 0.75) {
        trapezoid = 0.375;
    } else if (shoulderWidth <= 0.625 && shoulderHeight === 0.0 && neckWidth == 0.75) {
        trapezoid = 0.625;
    } else if (shoulderWidth > 0.625 && shoulderHeight === 0.0 && neckWidth == 0.75) {
        trapezoid = 0.875;
    } else if (shoulderWidth <= 0.25 && shoulderHeight === 0.0 && neckWidth == 1.0) {
        trapezoid = 0.25;
    } else if (shoulderWidth <= 0.625 && shoulderHeight === 0.0 && neckWidth == 1.0) {
        trapezoid = 0.5;
    } else if (shoulderWidth > 0.625 && shoulderHeight === 0.0 && neckWidth == 1.0) {
        trapezoid = 0.75;
    } else if (shoulderWidth <= 0.125 && shoulderHeight === 0.5 && neckWidth <= 0.25) {
        trapezoid = 0.25;
    } else if (shoulderWidth <= 0.5 && shoulderHeight === 0.5 && neckWidth <= 0.25) {
        trapezoid = 0.5;
    } else if (shoulderWidth <= 1.0 && shoulderHeight === 0.5 && neckWidth <= 0.25) {
        trapezoid = 0.625;
    } else if (shoulderWidth <= 0.25 && shoulderHeight === 0.5 && neckWidth == 0.5) {
        trapezoid = 0.25;
    } else if (shoulderWidth <= 0.625 && shoulderHeight === 0.5 && neckWidth == 0.5) {
        trapezoid = 0.5;
    } else if (shoulderWidth > 0.625 && shoulderHeight === 0.5 && neckWidth == 0.5) {
        trapezoid = 0.625;
    } else if (shoulderWidth <= 0.125 && shoulderHeight === 0.5 && neckWidth == 0.75) {
        trapezoid = 0.125;
    } else if (shoulderWidth <= 0.5 && shoulderHeight === 0.5 && neckWidth == 0.75) {
        trapezoid = 0.375;
    } else if (shoulderWidth > 0.5 && shoulderHeight === 0.5 && neckWidth == 0.75) {
        trapezoid = 0.5;
    } else if (shoulderWidth <= 0.25 && shoulderHeight === 0.5 && neckWidth == 1.0) {
        trapezoid = 0.125;
    } else if (shoulderWidth <= 0.625 && shoulderHeight === 0.5 && neckWidth == 1.0) {
        trapezoid = 0.25;
    } else if (shoulderWidth > 0.625 && shoulderHeight === 0.5 && neckWidth == 1.0) {
        trapezoid = 0.5;
    } else if (shoulderWidth <= 0.25 && shoulderHeight === 1.0 && neckWidth <= 0.5) {
        trapezoid = 0.125;
    } else if (shoulderWidth <= 0.625 && shoulderHeight === 1.0 && neckWidth <= 0.5) {
        trapezoid = 0.375;
    } else if (shoulderWidth > 0.625 && shoulderHeight === 1.0 && neckWidth <= 0.5) {
        trapezoid = 0.5;
    } else if (shoulderHeight === 1.0 && neckWidth >= 0.75) {
        trapezoid = 0.0;
    }
  // Update the morph target with the calculated trapezoid value
         updateMorphTarget('Shape_average_petite:High-poly_primitive0', 'trapezoid', trapezoid);
        updateMorphTarget('Shape_average_petite:High-poly_primitive1', 'trapezoid', trapezoid);
        updateMorphTarget('Shape_average_petite:High-poly_primitive2', 'trapezoid', trapezoid);
 }
    // Arm size based on shoulder width
    // if (shoulderWidth > 0.25) {
    //     maxArmSize = 1.0;
    // } else {
    //     maxArmSize = 0.75;
    // }

   
}


function femaleOverweight(){
  // Attach the trapezoid update function to the sliders
   sliders.shoulderWidth.addEventListener('change', calculateTrapezoid);
    sliders.shoulderHeight.addEventListener('change', calculateTrapezoid);
    sliders.neckWidth.addEventListener('change', calculateTrapezoid);

    function calculateTrapezoid() {
    let neckWidth = sliders.neckWidth.value;
    let shoulderWidth = sliders.shoulderWidth.value;
    let shoulderHeight = sliders.shoulderHeight.value;

    let trapezoid = 0; // Default value

    if (shoulderHeight === 0.0) {
        if (shoulderWidth <= 0.25) {
            if (neckWidth <= 0.5) {
                trapezoid = 0.5;
            } else if (neckWidth >= 0.75) {
                trapezoid = 0.375;
            }
        } else if (shoulderWidth <= 0.625) {
            if (neckWidth <= 0.5) {
                trapezoid = 0.75;
            } else if (neckWidth >= 0.75) {
                trapezoid = 0.625;
            }
        } else {
            if (neckWidth <= 0.5) {
                trapezoid = 1.0;
            } else if (neckWidth >= 0.75) {
                trapezoid = 0.875;
            }
        }
    } else if (shoulderHeight === 0.5) {
        if (shoulderWidth <= 0.25) {
            if (neckWidth <= 0.25) {
                trapezoid = 0.25;
            } else if (neckWidth === 0.5) {
                trapezoid = 0.25;
            } else if (neckWidth === 0.75) {
                trapezoid = 0.125;
            } else if (neckWidth === 1.0) {
                trapezoid = 0.0;
            }
        } else if (shoulderWidth <= 0.625) {
            if (neckWidth <= 0.25) {
                trapezoid = 0.5;
            } else if (neckWidth === 0.5) {
                trapezoid = 0.5;
            } else if (neckWidth === 0.75) {
                trapezoid = 0.375;
            } else if (neckWidth === 1.0) {
                trapezoid = 0.375;
            }
        } else {
            if (neckWidth <= 0.25) {
                trapezoid = 0.75;
            } else if (neckWidth === 0.5) {
                trapezoid = 0.625;
            } else if (neckWidth === 0.75) {
                trapezoid = 0.625;
            } else if (neckWidth === 1.0) {
                trapezoid = 0.5;
            }
        }
    } else if (shoulderHeight === 1.0) {
        trapezoid = 1.0; // Default for height 1.0
        if (shoulderWidth <= 0.25) {
            if (neckWidth <= 0.25) {
                trapezoid = 0.25;
            } else if (neckWidth === 0.5) {
                trapezoid = 0.125;
            } else if (neckWidth >= 0.75) {
                trapezoid = 0.0;
            }
        } else if (shoulderWidth <= 0.625) {
            if (neckWidth <= 0.25) {
                trapezoid = 0.5;
            } else if (neckWidth === 0.5) {
                trapezoid = 0.375;
            } else if (neckWidth >= 0.75) {
                trapezoid = 0.25;
            }
        } else {
            if (neckWidth <= 0.25) {
                trapezoid = 0.75;
            } else if (neckWidth === 0.5) {
                trapezoid = 0.625;
            } else if (neckWidth >= 0.75) {
                trapezoid = 0.5;
            }
        }
    }

        updateMorphTarget('Shape_average_petite:High-poly_primitive0', 'trapezoid', trapezoid);
        updateMorphTarget('Shape_average_petite:High-poly_primitive1', 'trapezoid', trapezoid);
        updateMorphTarget('Shape_average_petite:High-poly_primitive2', 'trapezoid', trapezoid);
}


}

function femaleObese(){
    sliders.shoulderWidth.addEventListener('change', updateTrapezoidShape);
    sliders.shoulderHeight.addEventListener('change', updateTrapezoidShape);
    sliders.neckWidth.addEventListener('change', updateTrapezoidShape);

    function calculateTrapezoid() {
    let neckWidth = sliders.neckWidth.value;
    let shoulderWidth = sliders.shoulderWidth.value;
    let shoulderHeight = sliders.shoulderHeight.value;
    let trapezoid = 0; // Default value
    if (shoulderWidth <= 0.25) {
        if (shoulderHeight === 0.0) {
            if (neckWidth === 0.0) {
                trapezoid = 0.375;
            } else if (neckWidth <= 0.5) {
                trapezoid = 0.5;
            } else {
                trapezoid = 0.375;
            }
        } else if (shoulderHeight === 0.5) {
            if (neckWidth <= 0.25) {
                trapezoid = 0.5;
            } else if (neckWidth === 0.5) {
                trapezoid = 0.25;
            } else {
                trapezoid = 0.125;
            }
        } else if (shoulderHeight === 1.0) {
            if (neckWidth <= 0.25) {
                trapezoid = 0.375;
            } else if (neckWidth === 0.5) {
                trapezoid = 0.25;
            } else {
                trapezoid = 0.0;
            }
        }
    } else if (shoulderWidth <= 0.625) {
        if (shoulderHeight === 0.0) {
            if (neckWidth === 0.0) {
                trapezoid = 0.625;
            } else if (neckWidth <= 0.5) {
                trapezoid = 0.75;
            } else {
                trapezoid = 0.5;
            }
        } else if (shoulderHeight === 0.5) {
            if (neckWidth <= 0.25) {
                trapezoid = 0.625;
            } else if (neckWidth === 0.5) {
                trapezoid = 0.5;
            } else {
                trapezoid = 0.375;
            }
        } else if (shoulderHeight === 1.0) {
            if (neckWidth <= 0.25) {
                trapezoid = 0.5;
            } else if (neckWidth === 0.5) {
                trapezoid = 0.375;
            } else {
                trapezoid = 0.25;
            }
        }
    } else { // shoulderWidth > 0.625
        if (shoulderHeight === 0.0) {
            if (neckWidth === 0.0) {
                trapezoid = 0.875;
            } else if (neckWidth <= 0.5) {
                trapezoid = 1.0;
            } else {
                trapezoid = 0.625;
            }
        } else if (shoulderHeight === 0.5) {
            if (neckWidth <= 0.25) {
                trapezoid = 0.75;
            } else if (neckWidth === 0.5) {
                trapezoid = 0.625;
            } else {
                trapezoid = 0.5;
            }
        } else if (shoulderHeight === 1.0) {
            if (neckWidth <= 0.25) {
                trapezoid = 0.625;
            } else if (neckWidth === 0.5) {
                trapezoid = 0.5;
            } else {
                trapezoid = 0.5; // neckWidth >= 0.75
            }
        }
    }

       updateMorphTarget('Shape_average_petite:High-poly_primitive0', 'trapezoid', trapezoid);
        updateMorphTarget('Shape_average_petite:High-poly_primitive1', 'trapezoid', trapezoid);
        updateMorphTarget('Shape_average_petite:High-poly_primitive2', 'trapezoid', trapezoid);
}










}


         


function bulidModel(BMI,sex){
  
    if (BMI >= 16 && BMI < 65) {
        if (sex == "female" || sex == "non-binary" || sex == "non binary") {
           
           
            if (BMI < 22) {
            
                // Load and render the scene
                loadGLBFile(`public/assets/modeler/${sex}_skinny.glb`);
                femaleSkinny();

            } else if (BMI < 26) {
               // Load and render the scene
                 loadGLBFile(`public/assets/modeler/${sex}_average.glb`);
                 femaleAverage();
            } else if (BMI < 36) {
                  // Load and render the scene
                  loadGLBFile(`public/assets/modeler/${sex}_OW.glb`);
                  femaleOverweight();
            } else if (BMI < 42) {
              
                  // Load and render the scene
                loadGLBFile(`public/assets/modeler/${sex}_obese.glb`);

                femaleObese();
            } 
        } else if (sex == "male") {
            if (BMI < 22) {
                loadGLBFile(`public/assets/modeler/${sex}_skinny.glb`);
            } else if (BMI < 36) {
               // Load and render the scene
               loadGLBFile(`public/assets/modeler/${sex}_average.glb`);
            } else {
                  // Load and render the scene
                  loadGLBFile(`public/assets/modeler/${sex}_OW.glb`);
            }
        }
    }else{
        alert(`You have entered a weight that is dangerously unhealthy. Please enter a weight between 90 - 400lbs or 40 - 226kg to continue.`);
    }
    
}

/**
 * Determines size based on the given type and value.
 * @param {string} type - The type of measurement (e.g., "head", "neckHeight", "neckWidth", "shoulderHeight", "shoulderWidth", "pregnancy", "arm", "armDistention", "breast", "torsoDistention", "crotchHeight", "legHeight", "leg", "hip").
 * @param {number} value - The value for the measurement, between 0.0 and 1.0.
 * @returns {string} - Returns the corresponding size description based on the input type and value.
 */
function getSize(type, value = 0.0) {
    switch (type) {
        case 'head':
            if (value <= 0.0) return "small";
            if (value <= 0.5) return "average";
            if (value <= 0.75) return "large";
            if (value <= 1.0) return "very large";
            break;
        case 'neckHeight':
            if (value === 0.0) return "Tall";
            if (value === 0.25 || value === 0.5) return "Average";
            if (value === 0.75) return "Short";
            if (value === 1.0) return "Hidden";
            break;
        case 'neckWidth': //change made
            if (value === 0.0) return "Skinny";
            if (value <= 0.5) return "Average";
            if (value <= 1.0) return "Girthy";
            break;
        case 'neckLayers': //change made
            if (value === 0.0) return "Null";
            if (value <= 1.0) return "Yes";
            break;
        case 'chinShape': //change made
            if (value === 0.0) return "Null";
            if (value <= 1.0) return "Yes";
            break;
        case 'Trapezoid': //change made
            if (value === 0.0) return "Average";
            if (value === 1.0) return "Trapezoidal";
            break;
        case 'shoulderHeight':
            if (value === 0.0) return "Strong";
            if (value === 0.5) return "Average";
            if (value === 1.0) return "Dropped";
            break;
        case 'shoulderWidth': //change made
            if (value <= 0.125) return "Narrow";
            if (value <= 0.625) return "Average";
            if (value <= 1.0) return "Broad";
            break;
        case 'pregnancy':
            if (value === 0.0) return "Trimester 1";
            if (value === 0.334) return "Trimester 2";
            if (value === 0.667) return "Trimester 3";
            if (value === 1.0) return "Trimester 4";
            break;
        case 'arm':
            if (value === 0.0) return "Small";
            if (value === 0.334 || value === 0.667) return "Average";
            if (value === 1.0) return "Large";
            break;
        case 'armDistention': //change made
            if (value === 0.0) return "Short";
            if (value === 0.5) return "Average";
            if (value === 1.0) return "Distended";
            break;
        case 'breast':
            if (value === 0.0) return "AA/A";
            if (value === 0.125) return "B";
            if (value === 0.25) return "C";
            if (value === 0.375) return "D/DD";
            if (value === 0.5) return "DDD/E";
            if (value === 0.625) return "F/G";
            if (value === 0.75) return "HH";
            if (value === 0.875) return "HHH";
            if (value === 1.0) return "J/K";
            break;
        case 'torsoDistention':
            if (value === 0.0) return "Short";
            if (value === 0.5) return "Average";
            if (value === 1.0) return "Tall";
            break;
        case 'crotchHeight': //change made
            if (value === 0.0) return "Average";
            if (value === 1.0) return "Tall";
            break;
        case 'legHeight':
            if (value === 0.0) return "Short";
            if (value === 0.5) return "Average";
            if (value === 1.0) return "Tall";
            break;
        case 'leg': //varies by shape
            if (value === 0.0) return "Leg 1";
            if (value === 0.334) return "Leg 2";
            if (value === 0.667) return "Leg 3";
            if (value === 1.0) return "Leg 4";
            break;
        case 'hip':
            if (value === 0.0) return "Small";
            if (value === 0.5) return "Average";
            if (value === 1.0) return "Wide";
            break;
        case 'bottomWidth':
            if (value === 0.0) return "Small";
            if (value === 1.0) return "Large";
            break;
        default:
            return "invalid type";
    }
    return "invalid value";
}

// Example usage:
// console.log(getSize('head', 0.6)); // Output: "large"
// console.log(getSize('neckHeight', 0.25)); // Output: "Average"
function generateAlphanumericCode(shapeKeys, weightClass) {
   
    let alphaNum1 = '';
    let alphaNum2 = '';
    let alphaNum3 = '';
    let alphaNum4 = '';
    let alphaNum5 = '';
    let alphaNum6 = '';
    let alphaNum7 = '';

    /*

    */

    // Switch case for weight class
    switch(weightClass) {
        case "skinny":
            alphaNum1 = "NY_";
            break;
        case "average":
            alphaNum1 = "VG_";
            break;
        case "OW": //changed above to OW
            alphaNum1 = "VE_";
            break;
        case "obese":
            alphaNum1 = "MO_";
    }

    // Switch case for stomach shape

    switch(shapeKeys.stomach_shape) {
        case "average":
            alphaNum2 = "001_";
            break;
        case "curvy":
            alphaNum2 = "002_";
            break;
        case "mt":
            alphaNum2 = "003_";
            break;
        case "spoon":
            alphaNum2 = "004_";
            break;
        case "rectangle":
            alphaNum2 = "005_";
            break;
        case "pregnant":
            alphaNum2 = "006_";
          
    }

    // Alphanumeric code for head and neck shape
    if (getSize('head',shapeKeys.head_size)=== "small") { //change narrow to small
        switch(shapeKeys.head_shape) {
            case 'oval':
                alphaNum3 = "HNVS_";
                break;
            case 'oblong':
                alphaNum3 = "HNBS_";
                break;
            default:
                alphaNum3 = "HNRS_";
        }
    } else if (getSize('head',shapeKeys.head_size) === "average") {
        switch(shapeKeys.head_shape) {
            case 'oval':
                alphaNum3 = "HAVS_";
                break;
            case 'oblong':
                alphaNum3 = "HABS_";
                break;
            default:
                alphaNum3 = "HARS_";
        }
    } else {  // large head *NOW there are now four slider values. Else equals large and very large
        switch(shapeKeys.head_shape) {
            case 'oval':
                alphaNum3 = "HLVS_";
                break;
            case 'oblong':
                alphaNum3 = "HLBS_";
                break;
            default:
                alphaNum3 = "HLRS_";
        }
    }

    // Alphanumeric code for shoulders
    if (getSize('shoulderWidth',shapeKeys.shoulder_width) === "narrow") {
        switch(getSize('shoulderHeight',shapeKeys.shoulder_height)) {
            case 'strong':
                alphaNum4 = "NWSS_";
                break;
            case 'average':
                alphaNum4 = "NWAS_";
                break;
            default:
                alphaNum4 = "NWDS_";
        }
    } else if ( getSize('shoulderWidth',shapeKeys.shoulder_width) === "average") {
        switch(getSize('shoulderHeight',shapeKeys.shoulder_height)) {
            case 'strong':
                alphaNum4 = "AWSS_";
                break;
            case 'average':
                alphaNum4 = "AWAS_";
                break;
            default:
                alphaNum4 = "AWDS_";
        }
    } else {  // broad shoulder
        switch(getSize('shoulderHeight',shapeKeys.shoulder_height)) {
            case 'strong':
                alphaNum4 = "BWSS_";
                break;
            case 'average':
                alphaNum4 = "BWAS_";
                break;
            default:
                alphaNum4 = "BWDS_";
        }
    }
    console.log(["AA/A", "B"].includes(getSize('breast',shapeKeys.breasts)))
    console.log(getSize('breast',shapeKeys.breasts));
    // Alphanumeric code for breasts and arms
    if (["AA/A", "B"].includes(getSize('breast',shapeKeys.breast))) {

       
        if (shapeKeys.arm_size === "small") { //changed thin to small
            alphaNum5 = "SBTA_";
        } else if (shapeKeys.arm_size === "average") {
            alphaNum5 = "SBAA_";
        } else {
            alphaNum5 = "SBBA_";  // arm size big
        }
    } else if (["C","D/DD"].includes(getSize('breast',shapeKeys.breast))) {
        if (shapeKeys.arm_size === "small") {
            alphaNum5 = "ABTA_";
        } else if (shapeKeys.arm_size === "average") {
            alphaNum5 = "ABAA_";
        } else {
            alphaNum5 = "ABBA_";  // arm size big
        }
    } else if (["DDD/E", "F/G"].includes(getSize('breast',shapeKeys.breast))) {
        if (shapeKeys.arm_size === "small") {
            alphaNum5 = "LBTA_";
        } else if (shapeKeys.arm_size === "average") {
            alphaNum5 = "LBAA_";
        } else {
            alphaNum5 = "LBBA_";  // arm size big
        }
    } else {  // enormous bust
        if (shapeKeys.arm_size === "small") {
            alphaNum5 = "EBTA_";
        } else if (shapeKeys.arm_size === "average") {
            alphaNum5 = "EBAA_";
        } else {
            alphaNum5 = "EBBA_";  // arm size big
        }
    }

    // Alphanumeric code for height
    if (shapeKeys.height > 67) {
        alphaNum6 = "100_";  // tall
    } else if (shapeKeys.height < 60) {
        alphaNum6 = "001_";  // small
    } else {
        alphaNum6 = "111_";  // average
    }

    // Alphanumeric code for legs and hips
    if (getSize('leg',shapeKeys.legs_size) === "small") { //changed none and some to small and average
        switch(shapeKeys.hips) {
            case 'small':
                alphaNum7 = "SLNH";
                break;
            case 'average':
                alphaNum7 = "SLSH";
                break;
            default:
                alphaNum7 = "SLWH";
        }
    } else if (shapeKeys.height > 60 && shapeKeys.height < 67) {
        switch(getSize('hip',shapeKeys.hips_size)) {
            case 'small':
                alphaNum7 = "ALNH";
                break;
            case 'average':
                alphaNum7 = "ALSH";
                break;
            default:
                alphaNum7 = "ALWH";
        }
    } else {  // big leg size
        switch(getSize('hip',shapeKeys.hips_size)) {
            case 'small':
                alphaNum7 = "BLNH";
                break;
            case 'average':
                alphaNum7 = "BLSH";
                break;
            default:
                alphaNum7 = "BLWH";
        }
    }

    return alphaNum1 + alphaNum2 + alphaNum3 + alphaNum4 + alphaNum5 + alphaNum6 + alphaNum7;
}






    const submitButton = document.getElementById('submitRegBtn');
    
    // Check if the submit button exists
    if (submitButton) {
        submitButton.addEventListener('click', function() {

 console.log(shapeKeys);
    const shapeKeysJson = JSON.stringify(shapeKeys);

        let shape = getWeightClass(userResponses.bmi);
      
        let alphanumeriCode = generateAlphanumericCode(shapeKeys,shape);
    // Populate the hidden input fields with values
    document.querySelector('input[name="shape_keys"]').value = shapeKeysJson;
    document.querySelector('input[name="shape"]').value = shape;
    document.querySelector('input[name="alphanumeri_code"]').value = alphanumeriCode;
        });
    } else {
        console.warn('Submit button not found on this page.');
    }








   



/**
 * Toggles the visibility of the password field and updates the visibility icon accordingly.
 */
function togglePasswordVisibility() {
    // Get the password field element
    var passwordField = document.getElementById("pass");
    // Get the visibility icon element
    var showPassImage = document.getElementById("showPassWord");

    // If the password field is currently hidden
    if (passwordField.type === "password") {
        // Show the password field
        passwordField.type = "text";
        // Update the visibility icon to show the hide password image
        showPassImage.src = assetBaseUrl + "/assets/img/login/show_pass.png";
    } else {
        // Otherwise, if the password field is currently visible
        // Hide the password field
        passwordField.type = "password";
        // Update the visibility icon to show the show password image
        showPassImage.src = assetBaseUrl + "/assets/img/login/hide_pass.png";
    }
}


/**
 * Toggles the visibility of modeler sections based on the selected option.
 * @param {HTMLSelectElement} selectElement - The dropdown element containing modeler options.
 */
function toggleControllers(selectElement) {
    // Define a mapping of modeler classes to corresponding DOM elements.
    const modelersGroup = {
        head_and_neck: document.querySelector('.head_and_neck'),
        shoulder_and_arm: document.querySelector('.shoulder_and_arm'),
        breast_and_torso: document.querySelector('.breast_and_torso'),
        leg_and_hip: document.querySelector('.leg_and_hip')
    };

    // Get the selected value from the dropdown.
    const selectedValue = selectElement.value;

    // Hide all modeler sections initially.
    hideSections(Object.values(modelersGroup));

    // Get the controls wrapper element.
    const controlsWrap = document.querySelector('.controls');

    // Toggle the visibility of the controls wrapper based on the selected value.
    controlsWrap.style.display = selectedValue ? 'block' : 'none';

    // Show the selected modeler section if a valid option is chosen.
    if (selectedValue && modelersGroup[selectedValue]) {
        modelersGroup[selectedValue].style.display = 'block';
    }
}

/**
 * Toggles the visibility of the controls wrapper and associated icons.
 */
function toggleCollapse() {
    // Get the controls wrapper and icon elements.
    const controlsWrap = document.querySelector('.controls');
    const plusIcon = document.querySelector('.collapsible .plus');
    const minusIcon = document.querySelector('.collapsible .minus');

    // Toggle the display property of the controls wrapper and update icons accordingly.
    controlsWrap.style.display = controlsWrap.style.display === 'block' || controlsWrap.style.display === '' ? 'none' : 'block';
    plusIcon.style.display = controlsWrap.style.display === 'block' ? 'none' : 'block';
    minusIcon.style.display = controlsWrap.style.display === 'block' ? 'block' : 'none';
}

function toggleMenu(id) {

    let toggle = document.querySelector(id);

    if (toggle.style.left == '0px') {
        toggle.style.left = ' -150%'
        toggle.style.width = '0'
        document.body.style.overflow = "scroll"

    } else {
        document.body.style.overflow = "hidden"
        toggle.style.left = '0px'
        toggle.style.width = '100vw'
    }
}

function mainNavBarInit() {
    let menu_container = document.querySelector('.menu_container');

    if (menu_container.style.display == 'none' || menu_container.style.display == '') {

        menu_container.style.display = 'block'
        menu_container.style.top = '75px'
    } else {
        menu_container.style.display = 'none'
        menu_container.style.top = ' -120%'
    }

}

function formValidateInit() {
    const emailEl = document.querySelector('#email');
    const passwordEl = document.querySelector('#password');
    const confirmPasswordEl = document.querySelector('#passwordConfirm');
    const form = document.querySelector('#regForm');



    const checkEmail = () => {
        let valid = false;
        const email = emailEl.value.trim();
        if (!isRequired(email)) {
            showError(emailEl, 'Email cannot be blank.');
        } else if (!isEmailValid(email)) {
            showError(emailEl, 'Email is not valid.')
        } else {
            showSuccess(emailEl);
            valid = true;
        }
        return valid;
    };

    const checkPassword = () => {
        let valid = false;


        const password = passwordEl.value.trim();

        if (!isRequired(password)) {
            showError(passwordEl, 'Password cannot be blank.');
        } else {
            showSuccess(passwordEl);
            valid = true;
        }

        return valid;
    };

    const checkConfirmPassword = () => {
        let valid = false;
        // check confirm password
        const confirmPassword = confirmPasswordEl.value.trim();
        const password = passwordEl.value.trim();

        if (!isRequired(confirmPassword)) {
            showError(confirmPasswordEl, 'Please enter the password again');
        } else if (password !== confirmPassword) {
            showError(confirmPasswordEl, 'The password does not match');
        } else {
            showSuccess(confirmPasswordEl);
            valid = true;
        }

        return valid;
    };

    const isEmailValid = (email) => {
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    };

    // const isPasswordSecure = (password) => {
    //     const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    //     return re.test(password);
    // };

    const isRequired = value => value === '' ? false : true;
    const isBetween = (length, min, max) => length < min || length > max ? false : true;


    const showError = (input, message) => {
        // get the form-field element
        const formField = input.parentElement;
        // add the error class
        formField.classList.remove('success');
        formField.classList.add('error');

        // show the error message
        const error = formField.querySelector('small');
        error.textContent = message;
    };

    const showSuccess = (input) => {
        // get the form-field element
        const formField = input.parentElement;

        // remove the error class
        formField.classList.remove('error');
        formField.classList.add('success');

        // hide the error message
        const error = formField.querySelector('small');
        error.textContent = '';
    }

    if (form != null) {
        form.addEventListener('submit', function(e) {
            // prevent the form from submitting
            // e.preventDefault();



            let isEmailValid = checkEmail(),
                isPasswordValid = checkPassword(),
                isConfirmPasswordValid = checkConfirmPassword();

            let isFormValid =
                isEmailValid &&
                isPasswordValid &&
                isConfirmPasswordValid;

            // submit to the server if the form is valid
            if (isFormValid) {

                document.querySelector('#regForm').submit();
            } else {
                e.preventDefault();
            }

            // validate fields

        });
    }



    const debounce = (fn, delay = 5000) => {
        let timeoutId;
        return (...args) => {
            // cancel the previous timer
            if (timeoutId) {
                clearTimeout(timeoutId);
            }
            // setup a new timer
            timeoutId = setTimeout(() => {
                fn.apply(null, args)
            }, delay);
        };
    };

    if (form != null) {
        form.addEventListener('input', debounce(function(e) {
            switch (e.target.id) {

                case 'email':
                    checkEmail();
                    break;
                case 'password':
                    checkPassword();
                    break;
                case 'passwordConfirmation':
                    checkConfirmPassword();
                    break;
            }
        }));
    }
}