import { User } from "../models/User";
import { UserService } from "../services/UserService";

export class UserController {

    constructor(private userService: UserService) {
        
    }

    updateProfile() {
        console.log('hahnzi')
         //const editBtn = document.getElementById('edit-save') as HTMLButtonElement;
        // const deleteBtn = document.getElementById('delete-cancel') as HTMLButtonElement;
        //editBtn.textContent = "radi";
        // editBtn.addEventListener('click', (e) => {
        //     e.preventDefault();
        //     console.log("rar");

        //      if(editBtn.textContent?.trim() === "radi")
        //         console.log("radi");
        //     else
        //         console.log('Radi opet');

        // })
       

    }

}