
var toCopy  = document.getElementById( 'passwordDisplay' ),
    btnCopy = document.getElementById( 'copier' );

btnCopy.addEventListener( 'click', function(){
	toCopy.select();
	document.execCommand( 'copy' );
	return false;
} );




 //récupérer la valeur a l'id indiqué
 //un pour range et un pour number
const characterAmountRange = document.getElementById('characterAmountRange');
const characterAmountNumber = document.getElementById('characterAmountNumber');

 //récupérer la valeur a l'id indiqué checkbox donc c'est true ou false
const includeUppercaseElement = document.getElementById ('includeUppercase'); //Majuscules
const includeNumbersElement = document.getElementById('includeNumbers'); //Nombres
const includeSymbolsElement = document.getElementById('includeSymbols'); //symboles


const form = document.getElementById('passwordGeneratorForm');

const passwordDisplay  = document.getElementById('passwordDisplay');

const LOWERCASE_CHAR_CODES = arrayCreator(97,122); //toute les lettres en minuscules par rapport a leur nombre ASCII
const UPPERCASE_CHAR_CODES = arrayCreator(65,90); //toute les lettres en majuscules par rapport a leur nombre ASCII
const NUMBER_CHAR_CODES = arrayCreator(48,57); //toute les nombres par rapport a leur nombre ASCII
const SYMBOL_CHAR_CODES = arrayCreator(33,47).concat(arrayCreator(58,64)).concat(arrayCreator(91, 96)).concat(arrayCreator(123,126)); //toute les nombres par rapport a leur nombre ASCII

//faire en sorte que si la valeur de l'input changer on entre dans la fonction syncCharacterAmount
characterAmountNumber.addEventListener('input', syncCharacterAmount);
characterAmountRange.addEventListener('input', syncCharacterAmount);

//fonction qui s'appelle toute seule lorsqu'il y a un evenement sur le form et particulièrement lorsque le bouttn submit est appuyé
form.addEventListener('submit', e => {
    //remet tout par défaut
    e.preventDefault();
    //récupère la valeur du nombre
    const characterAmount = characterAmountNumber.value;
    //récupère la valeur de la checkbox uppercase
    const includeUppercase = includeUppercaseElement.checked;
    //récupère la valeur de la checkbox numbers
    const includeNumbers = includeNumbersElement.checked;
    //récupère la valeur de la checkbox symboles
    const includeSymbols = includeSymbolsElement.checked;
    //lancer la fonction generatePassword avec comme paramètre les valeurs au dessus
    const password = generatePassword(characterAmount, includeUppercase, includeNumbers, includeSymbols);
    //afficher le texte générer par la fnction
    passwordDisplay.innerText = password;
})

//fonction pour générer un mot de passe, les attributs permettent d'ajouter ou nan les majuscules, les nombres, et les symboles
function generatePassword(characterAmount, includeUppercase, includeNumbers, includeSymbols){
    let charCodes = LOWERCASE_CHAR_CODES; //de base charCodes possède queles valeur des minuscules
    if (includeUppercase) charCodes = charCodes.concat(UPPERCASE_CHAR_CODES) // si includeUppercase est true alors on ajoute les valeurs des majuscules
    if (includeSymbols) charCodes = charCodes.concat(SYMBOL_CHAR_CODES)// si includeSymbols est true alors on ajoute les valeurs des symboles
    if (includeNumbers) charCodes = charCodes.concat(NUMBER_CHAR_CODES)// si includeNumbers est true alors on ajoute les valeurs des Nombres

    const passwordCharacters = [] //création d'un tableau pour le mdp
    for (let i = 0; i < characterAmount; i++) {
        const characterCode = charCodes[Math.floor(Math.random() * charCodes.length)] //prendre un chiffre aléatoire entre 0 et la longueur de charCodes et lui donne un charactereCode
        passwordCharacters.push(String.fromCharCode(characterCode)) //ajoute le nombre aléatoire trouver à la liste password et le convertis en string qui correspond au code ASCII
    }
    return passwordCharacters.join('')
}

//créer un tableau du petit nombre au grand nombre qui contient les codes ASCII de chaque caractère ajouter
function arrayCreator(low, high) {
    const array = []; ///créer e tableau
    for (let i = low; i <= high; i++){
        array.push(i);    //ajouter la valeur de i au tableua
    }
    return array; //retourner le tableau
}


function syncCharacterAmount(e){ //permet a la barre progressive et le nombre d'etre synchronisé
    const value = e.target.value; //récupérer la valeur cible dans l'input
    //affecter la valeur
    characterAmountNumber.value = value;
    characterAmountRange.value = value;
}
