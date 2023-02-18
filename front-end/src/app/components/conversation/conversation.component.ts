import { Component } from '@angular/core';

@Component({
  selector: 'app-conversation',
  templateUrl: './conversation.component.html',
  styleUrls: ['./conversation.component.scss']
})
export class ConversationComponent {

  fillerContent = [
    { send: "Send" },
    { send: "Send2" },
    { send: "Send3" },
    { send: "Send4" },
    { send: "Send5" },
    { send: "Send6" },
    { send: "Send7" },
    { send: "Send8" },
    { send: "Send9" },
    { send: "Send10" },
    { response: "R1" },
    { response: "R2" },
    { response: "R3" },
    { response: "R4" },
  ]


  /*
    fillerContent = [
      {
        id: 1, name: "Emilio",
        messages: {
          send: {
            message1: { msg: "Message send1", date: "16/04/2023 à 15h09" },
            message2: { msg: "Message send2", date: "16/04/2023 à 15h12" },
            message3: { msg: "Message send3", date: "16/04/2023 à 15h15" },


          },
          received: {
            message1: { msg: "Message received1", date: "16/04/2023 à 15h10" },
            message2: { msg: "Message received2", date: "16/04/2023 à 15h13" },
            message3: { msg: "Message received3", date: "16/04/2023 à 15h16" },
          }
        }
      }
    ]*/
}
