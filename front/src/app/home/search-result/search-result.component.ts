import { Component, OnInit } from '@angular/core';
import { PlanetsService } from '../../shared/planets.service';

@Component({
  selector: 'app-search-result',
  templateUrl: './search-result.component.html',
  providers: []
})
export class SearchResultComponent implements OnInit {

  planets;

  constructor(private planetsService: PlanetsService) { }

  ngOnInit() {

    this.planetsService.currentData.subscribe(data => {
      if (data !== null) {
        this.planets = data.results;
        localStorage.setItem('planets', JSON.stringify(this.planets));
      } else {
        this.planets = JSON.parse(localStorage.getItem('planets'));
      }
    });
    
  }

}
