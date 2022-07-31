import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class RecommendationService {

  url: string = "http://localhost:8000"

  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json'
    })
  }

  constructor(private http: HttpClient) { }

  listRecommendations(){
    return this.http.get<any>(this.url + `/api/recommendations`)
  }

  storeRecommendation(recommendation: any): Observable<any>{
    return this.http.post<any>(this.url + `/api/recommendation`, recommendation, this.httpOptions)
  }

  updateRecommendation(id: number): Observable<any> {
    return this.http.put<any>(this.url + `/api/recommendation/` + id + `/evolution`, this.httpOptions)
  }

  destroyRecommendation(id: number): Observable<any>{
    return this.http.delete<any>(this.url + `/api/recommendation/` + id, this.httpOptions)
  }
}
