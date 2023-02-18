import { MediaMatcher } from '@angular/cdk/layout';

import { ChangeDetectorRef, Component, OnDestroy } from '@angular/core';

@Component({
  selector: 'app-sidenav',
  templateUrl: './sidenav.component.html',
  styleUrls: ['./sidenav.component.scss']
})
export class SidenavComponent implements OnDestroy {
  mobileQuery: MediaQueryList;

  fillerNav = [
    { id: 1, name: "Emilio", photo: "", message: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt utlabore et dolore magna aliqua.", time: "15/02/23 à 2:00" },
    { id: 2, name: "Laurine", photo: "", message: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt utlabore et dolore magna aliqua.", time: "15/02/23 à 2:00" },
    { id: 3, name: "Doriane", photo: "", message: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt utlabore et dolore magna aliqua.", time: "15/02/23 à 2:00" },
    { id: 4, name: "Kevin", photo: "", message: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt utlabore et dolore magna aliqua.", time: "15/02/23 à 2:00" },
    { id: 5, name: "Emmanuelle", photo: "", message: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt utlabore et dolore magna aliqua.", time: "15/02/23 à 2:00" },
    { id: 6, name: "Dominique", photo: "", message: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt utlabore et dolore magna aliqua.", time: "15/02/23 à 2:00" },
    { id: 7, name: "Elwan", photo: "", message: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt utlabore et dolore magna aliqua.", time: "15/02/23 à 2:00" },
    { id: 8, name: "Dany", photo: "", message: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt utlabore et dolore magna aliqua.", time: "15/02/23 à 2:00" },
    { id: 9, name: "Kylian", photo: "", message: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt utlabore et dolore magna aliqua.", time: "15/02/23 à 2:00" },
    { id: 10, name: "Joshue", photo: "", message: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", time: "15/02/23 à 2:00" },
  ];
  /*fillerNav = Array.from({ length: 50 }, (_, i) => `Nav Item ${i + 1}`);*/


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
    { received: "Received" },
  ]
  /*fillerContent = Array.from(
    { length: 50 },
    () =>
      `Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
       labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
       laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
       voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
       cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.`,
  );*/

  /*fillerNav2 = [
    { send: "Send"},
    { received: "Received" },
  ]*/

  private _mobileQueryListener: () => void;

  constructor(changeDetectorRef: ChangeDetectorRef, media: MediaMatcher) {
    this.mobileQuery = media.matchMedia('(max-width: 600px)');
    this._mobileQueryListener = () => changeDetectorRef.detectChanges();
    this.mobileQuery.addListener(this._mobileQueryListener);
  }

  ngOnInit(): void {
  }

  ngOnDestroy(): void {
    this.mobileQuery.removeListener(this._mobileQueryListener);
  }

  shouldRun = true;
}
