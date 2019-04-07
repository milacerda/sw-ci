import { HttpClient, HttpHeaders, HttpErrorResponse } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Planets } from './planets.model';
import { catchError } from "rxjs/operators";
import { throwError as observableThrowError, Observable, BehaviorSubject } from 'rxjs';
import { URL_PLANETS } from '../app.config';

const httpOptions = {
    headers: new HttpHeaders({
        'Content-Type': 'application/x-www-form-urlencoded',
        'Accept': 'application/json',
    })
};

@Injectable()
export class PlanetsService {

    planets: Object;
    token: string;
    t: any;

    private dataSource = new BehaviorSubject(null);
    currentData = this.dataSource.asObservable();

    constructor(private http: HttpClient) {
    }

    public getPlanets(): Observable<any> {

        return this.http.get<Planets[]>(URL_PLANETS, httpOptions)
            .pipe(
                catchError(this.errorHandler)
            );

    }

    public searchPlanet(input): Observable<any> {

        return this.http.get<Planets[]>(URL_PLANETS + '?search=' + input, httpOptions)
            .pipe(
                catchError(this.errorHandler)
            );

    }

    public getPlanet(id): Observable<any> {

        return this.http.get<Planets>(URL_PLANETS + '/' + id, httpOptions)
            .pipe(
                catchError(this.errorHandler)
            );

    }

    public newPlanet(planet): Observable<Planets[]> {

        return this.http.post<Planets[]>(URL_PLANETS, planet, httpOptions)
            .pipe(
                catchError(this.errorHandler)
            );

    }

    public editPlanet(id, planet): Observable<Planets[]> {

        return this.http.put<Planets[]>(URL_PLANETS + '/' + id, planet, httpOptions)
            .pipe(
                catchError(this.errorHandler)
            );

    }

    public deletePlanet(id): Observable<Planets[]> {

        return this.http.delete<Planets[]>(URL_PLANETS + '/' + id, httpOptions)
            .pipe(
                catchError(this.errorHandler)
            );

    }

    errorHandler(error: HttpErrorResponse) {
        return observableThrowError(error.message || "server error");
    }

    changeData(data) {
        this.dataSource.next(data);
    }

}
