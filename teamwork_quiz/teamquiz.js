var _____WB$wombat$assign$function_____ = function(name) {return (self._wb_wombat && self._wb_wombat.local_init && self._wb_wombat.local_init(name)) || self[name]; };
if (!self.__WB_pmw) { self.__WB_pmw = function(obj) { this.__WB_source = obj; return this; } }
{
  let window = _____WB$wombat$assign$function_____("window");
  let self = _____WB$wombat$assign$function_____("self");
  let document = _____WB$wombat$assign$function_____("document");
  let location = _____WB$wombat$assign$function_____("location");
  let top = _____WB$wombat$assign$function_____("top");
  let parent = _____WB$wombat$assign$function_____("parent");
  let frames = _____WB$wombat$assign$function_____("frames");
  let opener = _____WB$wombat$assign$function_____("opener");

var num
var compromiser = 0
var ideas = 0
var encourager = 0
var leader = 0
var recorder = 0
var summariser = 0
var evaluator = 0
var checknum = 1  //to make sure question is answered before attempting next q
var checked1
var Quest = new Array()
for (num=-5; num<100; num++) //fills array with blanks.
{ Quest[num] = -1;}
num = 1;

Quest[0] = " "
Quest[1] = "1. I help others to find compromises between differing viewpoints."  //Compromiser
Quest[2] = "2. I introduce new ideas to groups in which I work."  //Ideas person
Quest[3] = "3. I try to decide on the criteria on which I will make my decisions and then stick to these."  //Leader
Quest[4] = "4. I am not swayed by emotional arguments."  //Evaluator
Quest[5] = "5. I am an optimist who tends to look on the positive side."  //Encourager
Quest[6] = "6. I am a well organised individual who is good at keeping to deadlines."  //Recorder
Quest[7] = "7. I build on the ideas of others."  //Summariser
Quest[8] = "8. I stick up for my opinions and try to argue persuasively and with logic for them."  //Leader
Quest[9] = "9. I suggest new ways of doing things."  //Ideas person
Quest[10] = "10. I make sure all possibilities are explored."  //Evaluator
Quest[11] = "11. I act as the note-taker for the groups I am involved in."  //Recorder
Quest[12] = "12. I support and praise other team members."  //Encourager 
Quest[13] = "13. I elaborate on what others have said."  //Summariser
Quest[14] = "14. I am willing to compromise my own view to obtain a group consensus."  //Compromiser
Quest[15] = "15. I use humour to remove stresses in groups in which I work."  //Encourager
Quest[16] = "16. I act as the spokesperson, to deliver the findings of the group."  //Recorder
Quest[17] = "17. I clarify other peoples contributions."  //Summariser
Quest[18] = "18. I am more concerned with major issues than with details."  //Ideas person
Quest[19] = "19. I try hard to keep up the group's energy level."  //Encourager
Quest[20] = "20. I try to keep relations between group members harmonious."  //Compromiser
Quest[21] = "21. I ask others to take responsibility for particular tasks."  //Leader
Quest[22] = "22. I use dispassionate, critical analysis to make decisions."  //Evaluator
Quest[23] = "23. I summarise what has been said."  //Summariser
Quest[24] = "24. I usually lead and co-ordinate the team effort."  //Leader
Quest[25] = "25. I listen carefully to what the other team members have to say and try to get quiet group members to contribute."  //Compromiser
Quest[26] = "26. I don't allow the group to over-run the time limit for the task."  //Recorder
Quest[27] = "27. I suggest new ways of looking at problems."  //Ideas person
Quest[28] = "28. I am good at evaluating competing proposals."  //Evaluator
Quest[29] = ""

function NextQuest()
{	  
	window.document.form1.nextquestbutton.value="Next Question";
	window.document.form1.Questionbox.value=Quest[num];
	window.document.form1.question_1[0].checked=false //resets radio buttons 
	window.document.form1.question_1[1].checked=false 
	window.document.form1.question_1[2].checked=false 
	window.document.form1.question_1[3].checked=false 
	num++
	if (Quest[num+49]==0) {window.document.form1.question_1[0].checked=true} //checks radio button if already answered
	if (Quest[num+49]==1) {window.document.form1.question_1[1].checked=true}
	if (Quest[num+49]==2) {window.document.form1.question_1[2].checked=true}
	if (Quest[num+49]==3) {window.document.form1.question_1[3].checked=true}
	if (num==30)
		{
		window.alert("That was the final question")
		window.document.form1.Scorebox.value=" Evaluator "+evaluator+"\r Ideas Person "+ideas+"\r Leader "+leader+"\r Compromiser "+compromiser+"\r Summariser "+summariser+"\r Recorder "+recorder+"\r Encourager "+encourager
		window.document.form1.Questionbox.value="That was the final question - see below for your score."
		num--
		}
}

function PrevQuest()
{	  
	num--
	window.document.form1.Questionbox.value=Quest[num-1];
	window.document.form1.question_1[0].checked=false //resets radio buttons 
	window.document.form1.question_1[1].checked=false 
	window.document.form1.question_1[2].checked=false 
	window.document.form1.question_1[3].checked=false 
	if (Quest[num+49]==0) {window.document.form1.question_1[0].checked=true} //checks radio button if already answered
	if (Quest[num+49]==1) {window.document.form1.question_1[1].checked=true}
	if (Quest[num+49]==2) {window.document.form1.question_1[2].checked=true}
	if (Quest[num+49]==3) {window.document.form1.question_1[3].checked=true}
	if (num==1)
		{
		window.document.form1.nextquestbutton.value="First Question";	
		window.alert("That was the first question")
		num++
		window.document.form1.Questionbox.value=Quest[num-1];
		if (Quest[num+49]==0) {window.document.form1.question_1[0].checked=true} //checks radio button if already answered
		if (Quest[num+49]==1) {window.document.form1.question_1[1].checked=true}
		if (Quest[num+49]==2) {window.document.form1.question_1[2].checked=true}
		if (Quest[num+49]==3) {window.document.form1.question_1[3].checked=true}
		}
}

function ShowAnswer()
{
window.document.form1.nextquestbutton.value="Next Question";
checknum=num; 
for (i=0;i<window.document.form1.question_1.length;i++)
	{
	if (window.document.form1.question_1[i].checked==true)
	checked1=i
	}
Quest[num+49] = checked1
evaluator=(Quest[54]+Quest[60]+Quest[72]+Quest[78])// 4 10 22 28
ideas=(Quest[52]+Quest[59]+Quest[68]+Quest[77])// 2 9 18 27
leader=(Quest[53]+Quest[58]+Quest[71]+Quest[74])// 3 8 21 24
compromiser=(Quest[51]+Quest[64]+Quest[70]+Quest[75])// 1 14 20 25
summariser=(Quest[57]+Quest[63]+Quest[67]+Quest[73]) // 7 13 17 23
recorder=(Quest[56]+Quest[61]+Quest[66]+Quest[76]) // 6 11 16 26
encourager=(Quest[55]+Quest[62]+Quest[65]+Quest[69]) //5 12 15 19
}


}
/*
     FILE ARCHIVED ON 02:36:40 Jun 26, 2022 AND RETRIEVED FROM THE
     INTERNET ARCHIVE ON 05:43:30 Jul 13, 2023.
     JAVASCRIPT APPENDED BY WAYBACK MACHINE, COPYRIGHT INTERNET ARCHIVE.

     ALL OTHER CONTENT MAY ALSO BE PROTECTED BY COPYRIGHT (17 U.S.C.
     SECTION 108(a)(3)).
*/
/*
playback timings (ms):
  captures_list: 69.418
  exclusion.robots: 0.072
  exclusion.robots.policy: 0.066
  cdx.remote: 0.06
  esindex: 0.008
  LoadShardBlock: 46.923 (3)
  PetaboxLoader3.datanode: 113.517 (5)
  load_resource: 229.81
  PetaboxLoader3.resolve: 95.005
  loaddict: 63.401
*/