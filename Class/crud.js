class crudClass{
    parameters={
        method:"POST",
        body:"",
        headers:{
            'Content-Type': 'application/json',
        }
    };
    url="ajax/";
    selectAll=async (url,search="",isJSON=true,page=2)=>{
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
        this.parameters.body=JSON.stringify(id);
        let result= await fetch(this.url+url,this.parameters);
        result=await result.json();
        return result;
    }
    update=async (url,id,data)=>{
        this.parameters.body=JSON.stringify({id,data});
        let result= await fetch(this.url+url,this.parameters);
        result=await result.text();
        return result;
    }
    delete=async (url,id)=>{
        this.parameters.body=JSON.stringify(id);
        let result= await fetch(this.url+url,this.parameters);
        result=await result.json();
        return result;
    }
    insert=async (url,data)=>{
        this.parameters.body=JSON.stringify(data);
        let result= await fetch(this.url+url,this.parameters);
        result=await result.text();
        return result;
    }
}
const crud=new crudClass();
export default  crud;
