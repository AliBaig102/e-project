class crudClass{
    parameters={
        method:"POST",
        body:"",
        headers:{
            'Content-Type': 'application/json',
        }
    };
    url="ajax/";
    selectAll=async (url,search="",isJSON=true,page=1)=>{
        this.parameters.body=JSON.stringify({search,page});
        let result= await fetch(this.url+url,this.parameters);
        if (isJSON){
        result=await result.json();
        }else {
            result=await result.text();
        }
        return result;
    }
    select=async (url,id)=>{
        this.parameters.body=JSON.stringify({id});
        let fetch= await fetch(url,this.parameters);
        fetch=await fetch.json();
        return fetch;
    }
    update=async (url,id,data)=>{
        this.parameters.body=JSON.stringify({id,data});
        let fetch= await fetch(url,this.parameters);
        fetch=await fetch.json();
        return fetch;
    }
    delete=async (url,id)=>{
        this.parameters.body=JSON.stringify({id});
        let fetch= await fetch(url,this.parameters);
        fetch=await fetch.json();
        return fetch;
    }
    insert=async (url,data)=>{
        this.parameters.body=JSON.stringify({data});
        let fetch= await fetch(url,this.parameters);
        fetch=await fetch.json();
        return fetch;
    }
}
const crud=new crudClass();
export default  crud;
