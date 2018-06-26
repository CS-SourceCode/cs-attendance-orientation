let names = ['rj','lean','jam','bilat'];
function winnerWinnerChickenDinner(names){
  let rand = Math.random() * names.length;
  return names[Math.floor(rand)];
}
alert(winnerWinnerChickenDinner(names));
