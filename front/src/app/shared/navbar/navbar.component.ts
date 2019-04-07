import { Component, OnInit } from '@angular/core';
import { PlanetsService } from '../planets.service';
import { NbSearchService } from '@nebular/theme';
import { Router } from '@angular/router';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  providers: [NbSearchService]
})
export class NavbarComponent implements OnInit {

  planets;
  searchTerm;

  constructor(
    private planetsService: PlanetsService, 
    private searchService: NbSearchService,
    private router: Router,
    ) {
    this.searchService.onSearchSubmit()
      .subscribe((data: any) => {
        this.searchTerm = data.term;
        this.search(this.searchTerm);
      })
  }

  ngOnInit() {
  }

  search(input){
    localStorage.removeItem('planets');
    this.planetsService.changeData(null);

    this.planetsService.searchPlanet(input).subscribe(
      (data) => {
        // this.planets = data.results;
        this.planetsService.changeData(data);
        this.router.navigate(['/search-results']);
      },
      (error) => {
        this.planetsService.changeData(null);
        this.router.navigate(['/search-results']);
      }
    );
  }

}
